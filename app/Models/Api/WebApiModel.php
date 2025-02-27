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


}
