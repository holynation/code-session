<?php

namespace App\Controllers;

use App\Enums\AuthEnum;
use App\Models\WebSessionManager;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;

/**
 * This is the authentication class handler for the web
 */
class Auth extends BaseController
{
    private WebSessionManager $webSessionManager;

    public function __construct()
    {
        $this->webSessionManager = new WebSessionManager;
    }

    /**
     * @throws Exception
     */
    public function login()
    {
        $validation = service('validation');
        $validation->setRules([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
            ],
        ]);

        $validateData = $this->request->getPost();
        if (!$validation->run($validateData)) {
            $errors = $validation->getErrors();
            foreach ($errors as $error) {
                return sendApiResponse(false, $error);
            }
        }

        $validData = $validation->getValidated();
        $username = $validData['username'];
        $password = $validData['password'];

        $user = loadClass('users');
        if (!$user->findUser($username, 'admin')) {
            return sendApiResponse(false, 'Invalid username or password');
        }
        $user = $user->data();
        if ($user->status == '0') {
            return sendApiResponse(false, 'Your account is not activated');
        }
        if (!decode_password($password, $user->password)) {
            return sendApiResponse(false, 'Invalid username or password');
        }
        $payload = $this->userPayloadData($user, $message);
        if (!$payload) {
            return sendApiResponse(false, $message);
        }
        return sendApiResponse(true, "You're successfully authenticated", $payload);
    }

    /**
     * This return the user payload data
     * @param object $user [description]
     * @param null $message
     * @return array|false [type]       [description]
     * @throws Exception
     */
    private function userPayloadData(object $user , &$message=null): bool|array
    {
        $userType = $this->webSessionManager->saveCurrentUser($user,true);
        if(!$userType){
            $message = "Oops, it appears your account is deactivated at the moment.";
            return false;
        }
        unset($userType['password']);
        $payload = $userType;
        $payload['type'] = AuthEnum::ADMIN;
        $payload['origin'] = base_url();
        $token = generateJwtToken($payload);
        unset($payload['user_table_id']);

        return [
            'token' => $token,
            'details' => $payload
        ];
    }

    public function logout()
    {
        $this->webSessionManager->logout();
        return sendApiResponse(true, 'You have successfully logged out');
    }
}
