<?php

namespace App\Controllers;

class Events extends BaseController
{
    public function session_status(){
        $sessionID = $this->request->getPost('session_id');
        $session = $this->db->table('session_manager')->where('id', $sessionID)->get();
        if ($session->getNumRows() == 0) {
            return sendApiResponse(false, 'Session not found');
        }
        // update process_status in session_manager table
        $this->db->table('session_manager')->where('id', $sessionID)->update(['process_status' => '1']);

        sendApiResponse(true, 'Session process provision successfully');
    }
}