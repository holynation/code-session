<?php 

namespace App\Entities;

use App\Models\Crud;

/** 
* This class is automatically generated based on the structure of the table.
* And it represent the model of the session_students table
*/
class Session_students extends Crud {

/** 
* This is the entity name equivalent to the table name
* @var string
*/
protected static $tablename = "Session_students"; 

/** 
* This array contains the field that can be null
* @var array
*/
public static $nullArray = ['fullname'];

/** 
* This are fields that must be unique across a row in a table.
* Similar to composite primary key in sql(oracle,mysql)
* @var array
*/
public static $compositePrimaryKey = [];

/** 
* This is to provided an array of fields that can be used for building a
* template header for batch upload using csv format
* @var array
*/
public static $uploadDependency = [];

/** 
* If there is a relationship between this table and another table, this display field properties is used as a column in the query.
* A field in the other table that displays the connection between this name and this table's name,something along these lines
* table_id. We cannot use a name similar to table id in the table that is displayed to the user, so the display field is used in
* place of it. To ensure that the other model queries use that field name as a column to be fetched with the query rather than the
* table id alone, the display field name provided must be a column in the table to replace the table id shown to the user.
* @var array|string
*/
public static $displayField = 'fullname';

/** 
* This array contains the fields that are unique
* @var array
*/
public static $uniqueArray = [];

/** 
* This is an associative array containing the fieldname and the datatype
* of the field
* @var array
*/
public static $typeArray = ['user_id' => 'int','session_manager_id' => 'int','matric_number' => 'varchar','fullname' => 'varchar','status' => 'tinyint','created_at' => 'timestamp'];

/** 
* This is a dictionary that map a field name with the label name that
* will be shown in a form
* @var array
*/
public static $labelArray = ['id' => '','user_id' => '','session_manager_id' => '','matric_number' => '','fullname' => '','status' => '','created_at' => ''];

/** 
* Associative array of fields in the table that have default value
* @var array
*/
public static $defaultArray = ['status' => '0','created_at' => 'current_timestamp()'];

/** 
*  This is an array containing an associative array of field that should be regareded as document field.
* it will contain the setting for max size and data type. Example: populate this array with fields that
* are meant to be displayed as document in the format
* array('fieldname'=>array('type'=>array('jpeg','jpg','png','gif'),'size'=>'1048576','directory'=>'directoryName/','preserve'=>false,'max_width'=>'1000','max_height'=>'500')).
* the folder to save must represent a path from the basepath. it should be a relative path,preserve
* filename will be either true or false. when true,the file will be uploaded with it default filename
* else the system will pick the current user id in the session as the name of the file 
* @var array
*/
public static $documentField = []; 

/** 
* This is an associative array of fields showing relationship between
* entities
* @var array
*/
public static $relation = ['user' => array('user_id','id')
,'session_manager' => array('session_manager_id','id')
];

/** 
* This are the action allowed to be performed on the entity and this can
* be changed in the formConfig model file for flexibility
* @var array
*/
public static $tableAction = ['delete' => 'delete/session_students', 'edit' => 'edit/session_students'];

public function __construct(array $array = [])
{
	parent::__construct($array);
}
 
public function getUser_idFormField($value = ''){
$fk = null; 
 	//change the value of this variable to array('table'=>'user','display'=>'user_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'user_name' as value from 'user' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('user', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

	if(is_null($fk)){
		return $result = "<input type='hidden' name='user_id' id='user_id' value='$value' class='form-control' />";
	}

	if(is_array($fk)){

		$result ="<div class='form-floating mb-7'>";
		$option = $this->loadOption($fk,$value);
		//load the value from the given table given the name of the table to load and the display field
		$result.="<select name='user_id' id='user_id' class='form-select'>
					$option
				</select>
			<label for='user_id'>User</label>";
			$result.="</div>";
		return $result;
	}

}

public function getSession_manager_idFormField($value = ''){
$fk = null; 
 	//change the value of this variable to array('table'=>'session_manager','display'=>'session_manager_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'session_manager_name' as value from 'session_manager' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('session_manager', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

	if(is_null($fk)){
		return $result = "<input type='hidden' name='session_manager_id' id='session_manager_id' value='$value' class='form-control' />";
	}

	if(is_array($fk)){

		$result ="<div class='form-floating mb-7'>";
		$option = $this->loadOption($fk,$value);
		//load the value from the given table given the name of the table to load and the display field
		$result.="<select name='session_manager_id' id='session_manager_id' class='form-select'>
					$option
				</select>
			<label for='session_manager_id'>Session Manager</label>";
			$result.="</div>";
		return $result;
	}

}

public function getMatric_numberFormField($value = ''){
return "<div class='form-floating mb-7'>
		<input type='text' name='matric_number' id='matric_number' value='$value' class='form-control' placeholder='Matric Number' required />
		<label for='matric_number'>Matric Number</label>
	</div>";
} 

public function getFullnameFormField($value = ''){
return "<div class='form-floating mb-7'>
		<input type='text' name='fullname' id='fullname' value='$value' class='form-control' placeholder='Fullname' required />
		<label for='fullname'>Fullname</label>
	</div>";
} 

public function getStatusFormField($value = ''){
return "<div class='form-floating mb-7'>
		<input type='text' name='status' id='status' value='$value' class='form-control' placeholder='Status' required />
		<label for='status'>Status</label>
	</div>";
} 

public function getCreated_atFormField($value = ''){
return "<div class='form-floating mb-7'>
		<input type='text' name='created_at' id='created_at' value='$value' class='form-control' placeholder='Created At' required />
		<label for='created_at'>Created At</label>
	</div>";
} 


protected function getUser(){
	$query = 'SELECT * FROM user WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->query($query,[$id]);
	if (!$result) {
		return false;
	}
	$resultObject = new \App\Entities\User($result[0]);
	return $resultObject;
}

protected function getSession_manager(){
	$query = 'SELECT * FROM session_manager WHERE id=?';
	if (!isset($this->array['ID'])) {
		return null;
	}
	$id = $this->array['ID'];
	$result = $this->query($query,[$id]);
	if (!$result) {
		return false;
	}
	$resultObject = new \App\Entities\Session_manager($result[0]);
	return $resultObject;
}


 
}

?>
