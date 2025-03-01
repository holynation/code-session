<?php

namespace App\Entities;

use App\Models\Crud;

/**
 * This class is automatically generated based on the structure of the table.
 * And it represent the model of the session_manager table
 */
class Session_manager extends Crud
{

    /**
     * This is the entity name equivalent to the table name
     * @var string
     */
    protected static $tablename = "Session_manager";

    /**
     * This array contains the field that can be null
     * @var array
     */
    public static $nullArray = ['hash_link'];

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
    public static $displayField = 'hash_link';

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
    public static $typeArray = ['user_id' => 'int', 'session_name' => 'varchar', 'language' => 'varchar', 'version' => 'varchar', 'start_duration' => 'datetime', 'end_duration' => 'datetime', 'invitation_expire' => 'int', 'allow_review' => 'tinyint', 'hash_link' => 'text', 'process_status' => 'tinyint', 'status' => 'tinyint', 'created_at' => 'timestamp'];

    /**
     * This is a dictionary that map a field name with the label name that
     * will be shown in a form
     * @var array
     */
    public static $labelArray = ['id' => '', 'user_id' => '', 'session_name' => '', 'language' => '', 'version' => '', 'start_duration' => '', 'end_duration' => '', 'invitation_expire' => '', 'allow_review' => '', 'hash_link' => '', 'process_status' => '', 'status' => '', 'created_at' => ''];

    /**
     * Associative array of fields in the table that have default value
     * @var array
     */
    public static $defaultArray = ['allow_review' => '1', 'process_status' => '0', 'status' => '1', 'created_at' => 'current_timestamp()'];

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
    public static array $relation = ['user' => array('user_id', 'id')
    ];

    /**
     * This are the action allowed to be performed on the entity and this can
     * be changed in the formConfig model file for flexibility
     * @var array
     */
    public static array $tableAction = ['delete' => 'delete/session_manager', 'edit' => 'edit/session_manager'];

	public static array $apiSelectClause = ['id','user_id','session_name','language','version','start_duration',
		'end_duration','invitation_expire','allow_review','process_status','status','created_at'];

    public function __construct(array $array = [])
    {
        parent::__construct($array);
    }

    public function getUser_idFormField($value = '')
    {
        $fk = null;
        //change the value of this variable to array('table'=>'user','display'=>'user_name'); if you want to preload the value from the database where the display key is the name of the field to use for display in the table.[i.e the display key is a column name in the table specify in that array it means select id,'user_name' as value from 'user' meaning the display name must be a column name in the table model].It is important to note that the table key can be in this format[array('table' => array('user', 'another table name'))] provided that their is a relationship between these tables. The value param in the function is set to true if the form model is used for editing or updating so that the option value can be selected by default;

        if (is_null($fk)) {
            return $result = "<input type='hidden' name='user_id' id='user_id' value='$value' class='form-control' />";
        }

        if (is_array($fk)) {

            $result = "<div class='form-floating mb-7'>";
            $option = $this->loadOption($fk, $value);
            //load the value from the given table given the name of the table to load and the display field
            $result .= "<select name='user_id' id='user_id' class='form-select'>
					$option
				</select>
			<label for='user_id'>User</label>";
            $result .= "</div>";
            return $result;
        }

    }

    public function getSession_nameFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='session_name' id='session_name' value='$value' class='form-control' placeholder='Session Name' required />
		<label for='session_name'>Session Name</label>
	</div>";
    }

    public function getLanguageFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='language' id='language' value='$value' class='form-control' placeholder='Language' required />
		<label for='language'>Language</label>
	</div>";
    }

    public function getVersionFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='version' id='version' value='$value' class='form-control' placeholder='Version' required />
		<label for='version'>Version</label>
	</div>";
    }

    public function getStart_durationFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='start_duration' id='start_duration' value='$value' class='form-control' placeholder='Start Duration' required />
		<label for='start_duration'>Start Duration</label>
	</div>";
    }

    public function getEnd_durationFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='end_duration' id='end_duration' value='$value' class='form-control' placeholder='End Duration' required />
		<label for='end_duration'>End Duration</label>
	</div>";
    }

    public function getInvitation_expireFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='invitation_expire' id='invitation_expire' value='$value' class='form-control' placeholder='Invitation Expire' required />
		<label for='invitation_expire'>Invitation Expire</label>
	</div>";
    }

    public function getAllow_reviewFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='allow_review' id='allow_review' value='$value' class='form-control' placeholder='Allow Review' required />
		<label for='allow_review'>Allow Review</label>
	</div>";
    }

    public function getHash_linkFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='hash_link' id='hash_link' value='$value' class='form-control' placeholder='Hash Link' required />
		<label for='hash_link'>Hash Link</label>
	</div>";
    }

    public function getProcess_statusFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='process_status' id='process_status' value='$value' class='form-control' placeholder='Process Status' required />
		<label for='process_status'>Process Status</label>
	</div>";
    }

    public function getStatusFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='status' id='status' value='$value' class='form-control' placeholder='Status' required />
		<label for='status'>Status</label>
	</div>";
    }

    public function getCreated_atFormField($value = '')
    {
        return "<div class='form-floating mb-7'>
		<input type='text' name='created_at' id='created_at' value='$value' class='form-control' placeholder='Created At' required />
		<label for='created_at'>Created At</label>
	</div>";
    }


    protected function getUser()
    {
        $query = 'SELECT * FROM user WHERE id=?';
        if (!isset($this->array['ID'])) {
            return null;
        }
        $id = $this->array['ID'];
        $result = $this->query($query, [$id]);
        if (!$result) {
            return false;
        }
        $resultObject = new \App\Entities\User($result[0]);
        return $resultObject;
    }

	public function APIList($filterList, $queryString, $start, $len, $orderBy): array
	{
		$temp = getFilterQueryFromDict($filterList);
		$filterQuery = buildCustomWhereString($temp[0], $queryString, false);
		$filterValues = $temp[1];

		if (isset($_GET['sortBy']) && $orderBy) {
			$filterQuery .= " order by $orderBy ";
		} else {
			$filterQuery .= " order by created_at desc ";
		}

		if (isset($_GET['start']) && $len) {
			$filterQuery .= " limit $start, $len";
		}
		if (!$filterValues) {
			$filterValues = [];
		}
		$tablename = 'session_manager';
		$query = "SELECT " . buildApiClause(static::$apiSelectClause, $tablename) . " from $tablename $filterQuery";

		$query2 = "SELECT COUNT(*) AS total_rows FROM {$tablename}";
		$res = $this->db->query($query, $filterValues);
		$res = $this->processList($res->getResultArray());
		$res2 = $this->db->query($query2)->getRow()->total_rows;
		return [$res, $res2];
	}

    private function processList(array $items): array
    {
        $generator = useGenerators($items);
        $payload = [];
        foreach ($generator as $item) {
            $payload[] = $this->loadExtras($item);
        }
        return $payload;
    }

    public function loadExtras($item)
    {
        if (isset($item['id'])) {
            // get all session_questions where session_manager_id = $item['id']
            $session_questions = $this->db->table('session_questions')->where('session_manager_id', $item['id'])->get()->getResultArray();
            $item['session_questions'] = $session_questions;

            // get all session_students where session_manager_id = $item['id']
            $session_students = $this->db->table('session_students')->where('session_manager_id', $item['id'])->get()->getResultArray();
            $item['session_students'] = $session_students;
        }
        return $item;
    }


}

