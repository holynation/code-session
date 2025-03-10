<?php

namespace App\Models;

use App\Models\Crud;
use CodeIgniter\Model;

class WebSessionManager
{
    private $defaultType = array("admin", "customer");
    private $session;
    private \CodeIgniter\Database\BaseConnection $db;

    public function __construct()
    {
        $this->session = session();
        $this->db = db_connect();
    }

    /**
     * This function save the current user into the session
     * @param object $user [The user object needed to be saved in the session]
     * @param bool $return
     * @return array|false               void
     */
    public function saveCurrentUser(object $user, bool $return = false)
    {
        $userArray = $this->getRealUserData($user->user_type, $user->user_table_id);
        if (!$userArray) {
            return null;
        }
        $temp = $user->toArray();
        $all = array_merge($userArray, $temp);
        if ($return) {
            return $all;
        }
        $this->session->set($all);
    }

    public function saveOnlyCurrentUser(Crud $user, $return = false)
    {
        $all = $user->toArray();
        if ($return) {
            return $all;
        }
        $this->session->set($all);
    }

    /**
     * This is to get user_type info
     * @param string $userType [description]
     * @param int $uid [description]
     * @return object|array|null [type]           [description]
     */
    public function getRealUserData(string $userType, int $uid): object|array|null
    {
        $userType = loadClass($userType);
        $moreInfo = $this->db->table($userType::$tablename)->getWhere(array('id' => $uid, 'status' => '1'), 1, 0);
        if ($moreInfo->getNumRows() == 0) {
            return null;
        }
        return $moreInfo->getRowArray();
    }

    public function getCurrentUserDefaultRole()
    {
        $rolename = $this->getCurrentUserProp('usertype');
        if ($rolename == false) {
            redirect(base_url() . 'auth/logout');
        }
        return in_array($rolename, $this->defaultType) ? $rolename : 'admin';
    }

    public function getCurrentUser(&$more)
    {
        $userType = $this->session->get('usertype');
        $user = $this->loadObjectFromSession('User');
        $len = func_num_args();
        if ($len == 1) {
            $more = $this->loadObjectFromSession(ucfirst($userType));
        }
        return $user;
    }

    private function loadObjectFromSession($classname)
    {
        $this->load->model(lcfirst($classname));
        $field = array_keys($classname::$fieldLabel);
        for ($i = 0; $i < count($field); $i++) {
            $temp = $this->session->get($field[$i]);
            if (!$temp) {
                continue;
            }
            $array[] = $temp;
        }
        return new $classname($array); //return the object for some process
    }

    public function logout()
    {
        // just clear the session
        $this->session->destroy();
    }

    /**
     * get the user property saved in the session
     * @param  [string] $propname [the property to get from the session]
     * @return array|bool|float|int|object|string|null [mixed]  [the value saved in the session with the key or empty string if the item is not present in the database]
     */
    public function getCurrentUserProp($propname)
    {
        return $this->session->get($propname);
    }

    /**
     * checks if the session is active or not
     * @return boolean [true if the session is active or false otherwise]
     */
    public function isSessionActive()
    {
        $userid = $this->session->get('ID');
        if (!empty($userid)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * [getFlashMessage description]
     * @param string $name [description]
     * @return [type]       [description]
     */
    public function getFlashMessage(string $name)
    {
        return $this->session->getFlashdata($name);
    }

    public function setFlashMessage($name, $value)
    {
        $this->session->setFlashdata($name, $value);
    }

    /**
     * This function is used to set content on the session.
     * This is delegating to the default session function on codeigniter
     * @param [type] $name  [description]
     * @param [type] $value [description]
     */
    public function setContent($name, $value)
    {
        $this->session->set($name, $value);
    }

    /**
     * [setArrayContent description]
     * @param array $array [description]
     */
    public function setArrayContent(array $array)
    {
        $this->session->set($array);
    }

    /**
     * [unsetContent description]
     * @param string $name [description]
     * @return [type]       [description]
     */
    public function unsetContent(string $name)
    {
        $this->session->remove($name);
    }

    /**
     * This set of function check the type of user that is currently logged in
     * @param string $userType [description]
     * @param int|string $userId [description]
     * @return object              [description]
     */
    public function isCurrentUserType(string $userType, int $userId = null)
    {
        $temp = $userType == $this->getCurrentUserProp('user_type');
        if (!$temp) {
            return false;
        }
        $st = '';
        if ($userId != null) {
            $st = $userId;
        } else {
            $st = $this->getCurrentUserProp('user_table_id');
        }

        $userType = loadClass($userType);
        $result = new $userType(array('ID' => $st));
        $result->load();
        return $result;
    }

    public function getUserDisplayName()
    {
        return $this->getCurrentUserProp('firstname') . ' ' . $this->getCurrentUserProp('lastname');
    }

    public function getAllData()
    {
        return $this->session->get();
    }

}

