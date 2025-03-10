<?php

/**
 * This is the Model that manages Api specific request
 */

namespace App\Models\Api;

use App\Models\Mailer1;
use App\Models\WebSessionManager;
use App\Traits\AccountTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;
use Config\Services;
use Exception;

class WebApiModel extends Model
{
    use AccountTrait;

    protected ?RequestInterface $request;

    protected ?ResponseInterface $response;

    private WebSessionManager $webSessionManager;

    protected $db;

    public function __construct(RequestInterface $request = null, ResponseInterface $response = null)
    {

        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $this->response = $response;
        $this->webSessionManager = new WebSessionManager;
    }

    public function update_user_auth()
    {
        $validation = Services::validation();
        $validation->setRule('username', 'username', 'required');
        $validation->setRule('current_password', 'current password', 'required');
        $validation->setRule('password', 'password', 'required');
        $validation->setRule('confirm_password', 'confirm password', 'required|matches[password]');
        if (!$validation->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            foreach ($errors as $error) {
                return sendApiResponse(false, $error);
            }
        }
        $validData = $validation->getValidated();
        $username = $validData['username'];
        $curr_password = $validData['current_password'];
        $new = $validData['password'];

        $customer = currentAPIUser();
        if (!$customer) {
            return sendApiResponse(false, 'Invalid users');
        }

        $id = $customer->user_id;
        $user = loadClass('users');

        if ($user->findUserProp($id)) {
            if (!decode_password(trim($curr_password), $user->data()[0]['password'])) {
                return sendApiResponse(false, 'Please type-in your password correctly');
            }
        }

        if($user->data()[0]['has_change_password'] == '1'){
            return sendApiResponse(false, 'You have already changed your auth details');
        }

        $new = encode_password($new);
        $query = "UPDATE users set username = '$username', password = '$new', has_change_password = '1' where id=?";
        if ($this->db->query($query, array($id))) {
            return sendApiResponse(true, 'You have successfully changed your auth details');
        } else {
            return sendApiResponse(false, 'Unable to update your auth details, please try again');
        }
    }

    /**
     * [profile description]
     * @return false|string [type]
     */
    public function profile()
    {
        return $this->accountProfile();
    }

    private function transformDataInput(array $inputData, array $data): array
    {
        return array_map(function ($item) use ($data) {
            return array_merge($item, $data);
        }, $inputData);
    }

    private function transformQuestionData(array $data, $extra): array
    {
        return array_map(function ($item) use($extra){
            if (isset($item['test_cases'])) {
                $item['test_cases'] = json_encode($item['test_cases']);
            }
            if (isset($item['flags'])) {
                $item['flags'] = json_encode($item['flags']);
            }

            return array_merge($item, $extra);
        }, $data);
    }

    private function generateLink($sessionID): array
    {
        $encrypter = service('encrypter');
        $sessionID = (string) $sessionID;
        $fid = bin2hex($encrypter->encrypt($sessionID));

        $hid = hash('sha512', $sessionID);
        $tid = time();

        return [
            'fid' => $fid,
            'hid' => $hid,
            'tid' => $tid,
            'route_path' => 'link/validate_tunnel',
            'link' => site_url("link/validate_tunnel?fid={$fid}&hid={$hid}&tid={$tid}")
        ];
    }

    public function app_session_manager(){
        $validation = Services::validation();
        $rules = [
            'session_init.language' => 'required|string',
            'session_init.version' => 'required|string',
            'session_init.start_duration' => 'required|valid_date[Y-m-d H:i:s]',
            'session_init.end_duration' => 'required|valid_date[Y-m-d H:i:s]',
            'session_init.session_name' => 'required|string',
            'session_init.allow_review' => 'required|string',
            'session_init.invitation_expire' => 'required|integer',

            'questions.*.question' => 'required|string',
            'questions.*.instruction' => 'required|string',
            'questions.*.test_cases.*.input_data' => 'required|string',
            'questions.*.test_cases.*.expected_outcome' => 'required|string',
            'questions.*.test_cases.*.total_weight' => 'required|string',
            'questions.*.flags.*.name' => 'if_exist|required|string',
            'questions.*.flags.*.value' => 'if_exist|required|string',

            'enrollment.*.fullname' => 'required|string',
            'enrollment.*.matric_number' => 'required|string',
        ];

        $messages = [
            'session_init.language' => [
                'required' => 'The language field is required.',
                'string' => 'The language field must be a string.',
            ],
            // Add more custom messages as needed...
        ];
        $validation->setRules($rules, $messages);
        if (!$validation->run($this->request->getPost())) {
            $errors = $validation->getErrors();
            foreach ($errors as $error) {
                return sendApiResponse(false, $error);
            }
        }
        $validData = $validation->getValidated();
        $sessionInit = $validData['session_init'];
        $questions = $validData['questions'];
        $enrollment = $validData['enrollment'];
        $currentUser = currentAPIUser();

        try{
            $this->db->transBegin();

            // insert into table db:session_manager and get the insert id
            $sessionInit['created_at'] = Time::now();
            $sessionInit['allow_review'] = ($sessionInit['allow_review'] == 'yes') ? 1 : 0;
            $sessionInit['status'] = '1';
            $sessionInit['process_status'] = '0';
            $sessionInit['user_id'] = $currentUser->user_id;
            $this->db->table('session_manager')->insert($sessionInit);
            $session_id = $this->db->insertID();

            $questionData = [
                'user_id' => $currentUser->user_id,
                'session_manager_id' => $session_id,
            ];
            $questionData = $this->transformQuestionData($questions, $questionData);
            $this->db->table('session_questions')->insertBatch($questionData);

            $enrollmentData = [
                'user_id' => $currentUser->user_id,
                'session_manager_id' => $session_id,
                'status' => '0'
            ];
            $enrollmentData = $this->transformDataInput($enrollment, $enrollmentData);
            $this->db->table('session_students')->insertBatch($enrollmentData);
            $allStudentID = $this->db->table('session_students')->select('id')->where('session_manager_id', $session_id)->get()->getResultArray();

            if ($this->db->transStatus() === false) {
                throw new \RuntimeException('Database operations failed');
            }
            $urlLink = $this->generateLink($session_id);
            $payload = [
                'url' => $urlLink,
                'session' => [
                    'session_id' => $session_id,
                    'instructor_id' => $currentUser->user_id,
                    'student_ids' => $allStudentID
                ],
            ];
            $this->db->transCommit();
            return sendApiResponse(true, 'Session created successfully', $payload);

        }catch (Exception $e){
            return sendApiResponse(false, $e->getMessage());
        }
    }

    public function update_session_manager(){
        $sessionID = $this->request->getPost('session_id');
        $link = $this->request->getPost('student_link');
        $session = $this->db->table('session_manager')->where('id', $sessionID)->get();
        if($session->getNumRows() == 0){
            return sendApiResponse(false, 'Session not found');
        }
        // update hash_link in table session_manager
        $this->db->table('session_manager')->where('id', $sessionID)->update(['hash_link' => $link]);
        return sendApiResponse(true, 'Session updated successfully');
    }

    public function session_question_by_id(){
        $sessionManager = loadClass('session_manager');
        $sessionID = $this->request->getGet('session_id');
        $session = $this->db->table('session_questions')->where('session_manager_id', $sessionID)->get();
        if($session->getNumRows() == 0){
            return sendApiResponse(false, 'Session not found');
        }
        $session = $sessionManager->transformSessionQuestion($session->getResultArray());
        return sendApiResponse(true, 'success', $session);
    }

    public function session_student_by_id(){
        $sessionID = $this->request->getGet('session_id');
        $session = $this->db->table('session_students')->where('session_manager_id', $sessionID)->get();
        if($session->getNumRows() == 0){
            return sendApiResponse(false, 'Session not found');
        }
        $session = $session->getResult();
        return sendApiResponse(true, 'success', $session);
    }


}
