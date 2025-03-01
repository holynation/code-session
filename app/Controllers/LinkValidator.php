<?php

namespace App\Controllers;

use Config\Services;

class LinkValidator extends BaseController
{
    public function validator(){
        $encrypter = service('encrypter');
        $sessionID = $encrypter->decrypt(hex2bin($this->request->getGet('fid')));
        $hash = $this->request->getGet('hid');
        $time = trim($this->request->getGet('tid'));
        $currentTime = time();

        if ($hash !== hash('sha512', $sessionID)) {
            return sendApiResponse(false, "The link is not valid");
        }

        $session = $this->db->table('session_manager')->where('id', $sessionID)->get();
        if ($session->getNumRows() == 0) {
            return sendApiResponse(false, 'Session not found');
        }
        $sessionTime = $session->getRow()->invitation_expire;
        if (isTimePassed($currentTime, $time, $sessionTime)) {
            return sendApiResponse(false, "Oops an invalid or expired link was provided.");
        }

        return sendApiResponse(true, 'Tunnel link validated successfully');
    }

    public function validate_matric(){
        $validation = Services::validation();
        $validation->setRule('matric', 'matric number', 'required');
        if (!$validation->run($this->request->getGet())) {
            $errors = $validation->getErrors();
            foreach ($errors as $error) {
                return sendApiResponse(false, $error);
            }
        }
        $validData = $validation->getValidated();
        $matric = $validData['matric'];
        $student = $this->db->table('session_students')->where('matric_number', $matric)->get();
        if($student->getNumRows() == 0){
            return sendApiResponse(false, 'Student not found');
        }
        $student = $student->getRow();
        // update status in session_students table
        $this->db->table('session_students')->where('id', $student->id)->update(['status' => '1']);
        return sendApiResponse(true, 'success', [
            'student_id' => $student->id,
            'instructor_id' => $student->user_id,
            'session_id' => $student->session_manager_id,
            'matric' => $matric,
            'fullname' => $student->fullname,
        ]);
    }
}