<?php
/**
 * This class like other controller class will have full access control capability
 */

namespace App\Controllers;

use App\Models\WebSessionManager;

class Actioncontroller extends BaseController
{
    private $uploadedFolderName = 'public/uploads';
    private $crudNameSpace = 'App\Models\Crud';
    protected $db;
    private $webSessionManager;

    /**
     * | NOTE: 1. To return things, it must be in json type using the provided function - createJsonMessage
     */

    public function __construct()
    {
        helper('string');
        $this->webSessionManager = new WebSessionManager;
        // basically the admin should be the one accessing this module
        if ($this->webSessionManager->getCurrentUserprop('user_type') == 'admin') {
            $role = loadClass('role');
            $role->checkWritePermission();
        }
    }

    // TODO: I WANNA WRAP EACH ACTION METHOD FOR BATCH OPERATION SUCH THAT WE CAN PERFORM MULTIPLE OPERATIONS ON THEM E.G MULTIPLE DELETE|DISABLE|ENABLE

    /**
     * @param string $model
     * @param int $id
     * @return json|array
     */
    public function disable(string $model, $id)
    {
        $model = loadClass($model);
        //check that model is actually a subclass
        if (empty($id) === false && is_subclass_of($model, $this->crudNameSpace)) {
            if ($model->disable($id, $this->db)) {
                echo createJsonMessage('status', true, 'message', "Action successfully performed", 'flagAction', true);
            } else {
                echo createJsonMessage('status', false, 'message', "Action can't be performed", 'flagAction', false);
            }
        } else {
            echo createJsonMessage('status', false, 'message', "Action can't be performed", 'flagAction', false);
        }
    }

    /**
     * @param string $model
     * @param int $id
     * @return json|array
     */
    public function enable(string $model, $id)
    {
        $tempModel = $model;
        $model = loadClass($model);
        //check that model is actually a subclass
        if (!empty($id) && is_subclass_of($model, $this->crudNameSpace) && $model->enable($id, $this->db)) {
            echo createJsonMessage('status', true, 'message', "Action successfully performed", 'flagAction', true);
        } else {
            echo createJsonMessage('status', false, 'message', "Action can't be performed", 'flagAction', false);
        }
    }

    /**
     * @param mixed $model
     * @param mixed $id
     */
    public function view($model, $id)
    {

    }

    /**
     * @param string $model
     * @return json|array
     */
    public function truncate(string $model)
    {
        if ($model) {
            $builder = $this->db->table($model);
            if ($builder->truncate()) {
                echo createJsonMessage('status', true, 'message', "Item successfully truncated...", 'flagAction', true);
            } else {
                echo createJsonMessage('status', false, 'message', "Cannot truncate item...", 'flagAction', false);
            }
        }
    }

    /**
     * @param string $model
     * @param string $field
     * @param string|int $value
     * @param mixed $value
     * @return json|array
     */
    public function deleteModelByUserId(string $model, $field, $value)
    {
        $db = $this->db;
        $db->transBegin();
        $query = "delete from $model where $field=?";
        if ($db->query($query, [$value])) {
            $db->transCommit();
            echo createJsonMessage('status', true, 'message', 'Item deleted successfully...', 'flagAction', true);
            return true;
        } else {
            $db->transRollback();
            echo createJsonMessage('status', false, 'message', 'Cannot delete item(s)...', 'flagAction', true);
            return false;
        }
    }

    /**
     * @param string $model
     * @param string $extra - This is to remove any files attached to this single *  entity
     * @param int $id
     * @return json|array
     */
    public function delete(string $model, $extra = '', $id = '')
    {
        // verifying this action before performing it
        $id = ($id == '') ? $extra : $id;
        $extra = ($extra != '' && $id != '') ? base64_decode(urldecode($extra)) : $id;
        // this extra param is a method to find a file and removing it from the server
        if ($extra) {
            $newModel = loadClass($model);
            $paramFile = $newModel::$documentField;
            $directoryName = $model . '_path';
            $filePath = $this->uploadedFolderName . '/' . @$paramFile[$directoryName]['directory'] . $extra;
            $filePath = ROOTPATH . $filePath;
            if (file_exists($filePath)) {
                @chmod($filePath, 0777);
                @unlink($filePath); // remove the symlink only
            }
            $filePath = ROOTPATH . '/' . @$paramFile[$directoryName]['directory'] . $extra;
            if (file_exists($filePath)) {
                @chmod($filePath, 0777);
                @unlink($filePath); // remove the original file image
            }
        }
        $newModel = loadClass($model);
        // check that model is actually a subclass
        if (!empty($id) && is_subclass_of($newModel, $this->crudNameSpace) && $newModel->delete($id)) {
            $desc = "deleting the model $model with id {$id}";
            // $this->logAction($this->webSessionManager->getCurrentUserProp('ID'),$model,$desc);
            echo createJsonMessage('status', true, 'message', 'Item deleted successfully...', 'flagAction', true);
            return true;
        } else {
            echo createJsonMessage('status', false, 'message', 'Cannot delete item...', 'flagAction', true);
            return false;
        }
    }

    /**
     * @param string $model
     * @param string $value
     * @param int $id
     * @return json|array
     */
    public function changeStatus(string $model, string $value, int $id)
    {

    }

    /**
     * @param string $model
     * @param int $id
     * @return json|array
     */
    public function mail(string $model, $id)
    {
        return true;
    }

    /**
     * @param mixed $user
     * @param mixed $model
     * @param mixed $description
     */
    private function logAction($user, $model, $description)
    {
        $applicationLog = loadClass('application_log');
        $applicationLog->log($user, $model, $description);
    }

    private function getModelMail(string $model)
    {

    }

}
