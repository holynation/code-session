<?php
/**
 * this class help save the configuration needed by the form in order to use a single file for all the form code.
 * you only need to include the configuration data that matters. the default value will be substituted for other configuration value that does not have a key  for a particular entity.
 */
namespace App\Models;

use App\Models\WebSessionManager;

class FormConfig {
	private array $insertConfig = [];
	private $updateConfig;
	private $webSessionManager;
	public $currentRole;
	private $apiEntity = false;

	public function __construct(bool $currentRole = false, bool $apiEntity = false) {
		$this->currentRole = $currentRole;
		$this->apiEntity = $apiEntity;
		$this->webSessionManager = new WebSessionManager;
		if ($currentRole) {
			$this->buildInsertConfig();
			$this->buildUpdateConfig();
		}

	}

	/**
	 * this is the function to change when an entry for a particular entitiy needed to be addded. this is only necessary for entities that has a custom configuration for the form.Each of the key for the form model append insert option is included. This option inculde:
	 * form_name the value to set as the name and as the id of the form. The value will be overridden by the default value if the value if false.
	 * has_upload this field is used to determine if the form should include a form upload section for the table form list
	 * hidden this  are the field that should be pre-filled. This must contain an associative array where the key of the array is the field and the value is the value to be pre-filled on the value.
	 * showStatus field is used to show the status flag on the form. once the value is true the status field will be visible on the form and false otherwise.
	 * exclude contains the list of entities field name that should not be shown in the form. The filed for this form will not be display on the form.
	 * submit_label is the label that is going to be displayed on the submit button
	 * 	table_exclude is the list of field that should be removed when displaying the table.
	 * table_action contains an associative arrays action to be displayed on the action table and the link to perform the action.
	 * the query paramete is used to specify a query for getting the data out of the entity
	 * upload_param contains the name of the function to be called to perform
	 *
	 */
	private function buildInsertConfig(): void
    {
		if ($this->apiEntity) {
			$this->insertConfig = array
				(
				'voters' => array(
					'search' => array('firstname'),
				),
			);
		} else {
			$this->insertConfig = array
            (

			);
		}
	}

	/**
	 * This is to get the entity filter for a model using certain pattern
	 * @example 'entity_name'=>array(
	 * array(
	 * 'filter_label'=>'request_status', # this is the field to call for the filter
	 * 'filter_display'=>'active_status' # this is the query param supplied
	 * )),
	 * @param  string $tablename [description]
	 * @return [type]            [description]
	 */
	private function getFilter(string $tablename) {
		$result = [];
		if ($this->apiEntity) {
			$result = array(

			);
		} else {
			$result = array(

			);
		}

		if (array_key_exists($tablename, $result)) {
			return $result[$tablename];
		}
		return false;
	}

	/**
	 * This is the configuration for the edit form of the entities.
	 * exclude take an array of fields in the entities that should be removed from the form.
	 */
	private function buildUpdateConfig() {
		$userType = $this->webSessionManager->getCurrentUserProp('user_type');
		$exclude = [];
		if ($userType == 'customer') {
			$exclude = array('email', 'customer_path');
		}
		$this->updateConfig = array
			(
			'user' => array(
				'exclude' => ['username_2', 'user_type', 'token', 'last_logout', 'last_login', 'date_created', 'referral_code', 'password'],
			),
			//add new entry to this array
		);
	}

	public function getInsertConfig(?string $entities) {
		if (array_key_exists($entities, $this->insertConfig)) {
			$result = $this->insertConfig[$entities];
			if (($fil = $this->getFilter($entities))) {
				$result['filter'] = $fil;
			}
			$this->apiEntity = false;
			return $result;
		}
		if (($fil = $this->getFilter($entities))) {
			return array('filter' => $fil);
		}
		return false;
	}

	public function getUpdateConfig(?string $entities) {
		if (array_key_exists($entities, $this->updateConfig)) {
			$result = $this->updateConfig[$entities];
			if (($fil = $this->getFilter($entities))) {
				$result['filter'] = $fil;
			}
			return $result;
		}
		if (($fil = $this->getFilter($entities))) {
			return array('filter' => $fil);
		}
		return false;
	}
}
?>