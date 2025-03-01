<?php 

/**
 * This will get different entity details that can be use inside the APIs
 */
namespace App\Models\Api;

class EntityDetails
{
	public function __construct()
    {
        helper('string');
    }

    public function getSession_managerDetails(int $id)
    {
        # Get something
        $db = db_connect();
        $entity = loadClass('session_manager');
        $entity->id = $id;
        if(!$entity->load()){
            return sendApiResponse(false, 'Session not found');
        }
        $result = $entity->toArray();
        $questions = $db->table('session_questions')->where('session_manager_id', $id)->get();
        $students = $db->table('session_students')->where('session_manager_id', $id)->get();
        $result['questions'] = $questions->getResult() ?? null;
        $result['students'] = $students->getResult() ?? null;
        return $result;
    }


}

