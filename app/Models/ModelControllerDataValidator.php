<?php

/**
 * The controller that validate forms that should be inserted into a table based on the request url.
 * each method wil have the structure validate[modelname]Data
 */

namespace App\Models;

use Config\Services;
use Exception;

class ModelControllerDataValidator
{

    public function __construct()
    {
        helper('string');
    }

    public function validateOffices_postData(&$data, $type, &$db, &$message): bool
    {
        $validation = Services::validation();
        $validationData = $data;
        $validation->setRule('name', 'name', 'required');
        $validation->setRule('slug', 'slug', 'required');

        if (!$validation->run($validationData)) {
            $errors = $validation->getErrors();
            foreach ($errors as $error) {
                $message = $error;
                return false;
            }
        }

        return true;
    }


}
