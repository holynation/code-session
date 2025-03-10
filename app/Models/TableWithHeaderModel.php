<?php
/**
 * The model for generating table view for any model
 */
namespace App\Models;

use App\Models\TableActionModel;
use CodeIgniter\Model;

class TableWithHeaderModel extends Model {
	private $uploadedFolderName = 'uploads'; // this name should be constant and not change at all
	private $modelFolderName = 'entities';
	private $statusArray = array(1 => 'Active', 0 => 'Inactive');
	private $booleanArray = array(0 => 'Inactive', 1 => 'Active');
	private $defaultPagingLength = 15000;
	public $export = false;

	const UPLOAD_DIRECTORY = ROOTPATH . "writable/";

	private $_model = null;
	private $_modelObj = null;
	private $_header = null;
	private $_result;
	private $_paged = false;
	private $_start = 0;
	private $_length = null;
	private $_actionArray = [];
	private $queryString = [];
	private $_exclusionArray = [];
	private $_tableAttr = [];
	private $_icon = '';
	private $_exlcudeSerialNumber = false;
	private $crudNameSpace = 'App\Models\Crud';
	private $entitiesNameSpace = 'App\Entities\\';
	private $tableActionModel;
	protected $db;

	public function __construct() {
		$this->tableActionModel = new TableActionModel;
		$this->db = db_connect();
		helper(['string', 'filesystem']);
	}
	//create  a method that load the table based on the specified paramterr
	/**
	This  method get the table view of a model(tablename)
	 *the $model parameter is the name of the model to generate table view for
	 *$page variable paging ability is included as a part of the generated html
	 */
	public function loadExportTable(string $model, $data) {
		$res = array2csv($data);
		sendDownload($res, 'text/csv', $model . '.csv');exit;
	}
	/**
	 * data is the list of object you want to display as table.
	 */
	public function convertToTable($data, &$message = '', $start = 0, $length = NULL) {
		return $this->loadTable($this->_model, $data, $message = '', $start, $length);
	}

	public function openTableHeader(string $model, $attr = array(), $exclusionArray = array(), $removeId = true) {
		if (empty($model)) {
			throw new \Exception("The model parameter can't be empty...");
		}
		// setting the model and it instantiated class
		$this->_model = $model; // the real model name
		$this->_modelObj = loadClass($model); // the model class object

		$this->_exclusionArray = (is_array($exclusionArray)) ? $exclusionArray : [];
		$this->_tableAttr = !empty($attr) ? $attr : [];
		$this->_header = $this->getHeader($exclusionArray, $removeId);
		$this->_result .= $this->openTable($attr);
		return $this;
	}

	public function appendTableAction($action = null) {
		if (empty($this->_header)) {
			throw new \Exception("The model header can't be empty.");
		}
		$this->_actionArray = $action === null ? $this->_model::$tableAction : $action;
		$this->_result .= $this->generateheader($this->_header, $this->_actionArray);
		return $this;
	}

	public function generateTableBody($message = null, $resolve = true, $start = 0, $length = null, $sort = ' order by ID desc ', $where = '') {
		//use get function for the len and the start index for the sorting
		$this->_start = (isset($_GET['p_start']) && is_numeric($_GET['p_start'])) ? (int) $_GET['p_start'] : $start;
		$this->_length = (isset($_GET['p_len']) && is_numeric($_GET['p_len'])) ? (int) $_GET['p_len'] : ($length ? $length : $this->defaultPagingLength);
		$modelObj = $this->_modelObj;
		$icon = ($this->_icon) ? $this->_icon : "";
		$data = $modelObj->all($message, $resolve, $this->_start, $this->_length, $sort, $where);
		$this->_result .= $this->generateBody($data, $this->_exclusionArray, $this->_actionArray, $icon);
		return $this;
	}

	public function pagedTable($paged = false, $length = null) {
		$this->_paged = ($paged) ? $paged : false;
		if ($paged) {
			$this->_length = $length ? $length : $this->defaultPagingLength;
		}
		return $this;
	}

	public function generate() {
		if (empty($this->_result)) {
			throw new \Exception("The result object is empty");
		}
		$this->_result .= $this->closeTable();
		$countAll = '';
		if ($this->_paged) {
			$builder = $this->db->table($this->_model);
			$countAll = $builder->countAll();
		}

		if ($this->_paged && $countAll > $this->_length) {
			$this->_result .= $this->generatePagedFooter($countAll, $this->_start, $this->_length); //for testing sake
		}
		// Clear table class properties before generating the table
		$this->clearVar();
		$result = $this->_result;
		$this->_result = '';
		return $result;
	}

	private function loadTable(string $model, $data, $totalRow, $start, $length, $removeId = true) {
		if (!$this->validateModelNameAndAccess($model)) {
			return false;
		}
		if (empty($data) || $data == false) {
			$link = base_url("vc/$model/create");
			return "<div class='alert alert-info text-dark' style='margin:0 auto;'>NO RECORD FOUND</div>";
		}
		$header = $this->getHeader($this->_exclusionArray, $removeId);
		$result = $this->openTable($this->_tableAttr);
		$result .= $this->generateheader($header, $this->_actionArray);
		$result .= $this->generateBody($data);
		$result .= $this->closeTable();

		if ($this->_paged && $totalRow > $length) {
			$result .= $this->generatePagedFooter($totalRow, $start, $length); //for testing sake
		}
		$this->clearVar();
		return $result;
	}

	// the multipleAction arg is for performing multiple action using checkbox
	public function getTableHtml(&$message = '', $start = 0, $length = NULL, $resolve = true, $sort = ' order by ID desc ', $where = '') {

		$model = $this->_model;
		$newModel = $this->_modelObj;
		if ($this->_paged) {
			$length = $length ? $length : $this->defaultPagingLength;
		}
		//use get function for the len and the start index for the sorting
		$start = (isset($_GET['p_start']) && is_numeric($_GET['p_start'])) ? (int) $_GET['p_start'] : $start;
		$length = (isset($_GET['p_len']) && is_numeric($_GET['p_len'])) ? (int) $_GET['p_len'] : $length;

		$data = $newModel->all($message, $resolve, $start, $length, $sort, $where);

		$countAll = ''; // using this to count all the records in the model
		if ($this->_paged) {
			$builder = $this->db->table($model);
			$countAll = $builder->countAll();
		}
		return $this->export ? $this->loadExportTable($model, $data) : $this->loadTable($model, $data, $countAll, $start, $length, true);
	}

	//the action array will contain the
	private function generateActionHtml($data, $actionArray) {
		//the id will be extracted from
		$result = "<div class='dropdown-menu dropdown-menu-right'>
			<ul class='link-list-opt no-bdr'>
		";
		$result .= $this->buildHtmlAction($data, $actionArray);
		$result .= "</ul></div>";
		return $result;
	}

	private function buildHtmlAction($data, $actionArray) {
		//the link must be specified for the action that is to be performed
		$result = '';
		$queryString = null;
		foreach ($actionArray as $key => $value) {
			$link = '';
			$critical = '0';
			$label = '';
			$default = 1;

			// NOTE: Thinking of removing these part of code because what inspired it
			// was because i want to be able to dynaically delete images of model
			// if they exists.Since I can always write an overload method(delete) in the model itself

			// this section is used for getting another column alongside the ID of that model
			// something like this vc/admin/edit/model_name/new_column/id
			if (is_array($value)) {
				$temp = $value;
				$otherParam = $temp[1];
				$otherParam = $data->$otherParam;
				// check if the additional param include the default upload folder
				// this also means that the uploaded folder would start the directory of the path
				if (!empty($otherParam)) {
					if (startsWith($otherParam, $this->uploadedFolderName)) {
						$tempParam = explode('/', $otherParam);
						$otherParam = "/" . urlencode(base64_encode($tempParam[2])); // this would be the file name used
					}
				}
				$value = $temp[0] . $otherParam;
			}
			$currentid = $data->ID;
			// appending query string to generated link
			if (!empty($this->queryString)) {
				$tempData = $data->toArray();
				if (is_null($queryString) && $buildParam = array_intersect_key($tempData, $this->queryString)) {
					$queryString = http_build_query($buildParam);
					$queryString = '?' . $queryString;
				}
			}
			$classname = get_class($data);
			if (method_exists($this->tableActionModel, $value)) {
				// this method must return an array having this keys ['link','isCritical','label','ajax']
				$tempObj = $this->tableActionModel->$value($data, $this->_model);
				if (empty($tempObj)) {
					continue;
				}
				$tempLink = $tempObj['link'] . '/' . $currentid . $queryString;
				$link = $tempLink;
				$critical = $tempObj['isCritical'];
				$label = $tempObj['label'];
				$default = $tempObj['ajax'];
			} else {
				if (is_array($value)) {
					$link = $value[0] . '/' . $currentid . $queryString;
					$critical = $value[1];
					$default = $value[2];
				} else {
					// this is to ensure the data is sent using javascript and get back from javascript
					$criticalArray = array('delete', 'disable', 'reset password', 'remove', 'mail');
					if (in_array(strtolower($key), $criticalArray)) {
						$critical = 1;
					}
					$link = $value . '/' . $currentid . $queryString;
				}
				$label = $key;
				$link = base_url($link);
			}
			$editClass = '';
			$actionEvent = '';
			if ($label == 'edit' || $label == 'update') {
				$editClass = "data-ajax-edit='1'";
				$actionEvent = "onclick='loadAjaxEdit($(this));return false;'";
			} else if ($critical == '1') {
				$actionEvent = "onclick='loadAjaxCritical($(this));return false;'";
			}
			$result .= "<li data-item-id='$currentid' data-default='$default' data-critical='$critical' $editClass><a href='$link' class='dropdown-item text-center text-capitalize' $actionEvent>$label</a></li>";
		}
		return $result;
	}

	private function openTable(array $attr = array()) {
		$attr = (!empty($attr)) ? attrToString($attr) : "";
		return "  <div><div class=\"table-responsive text-nowrap\"><table $attr> \n";
	}

	public function appendEmptyIcon(string $icon = null) {
		$this->_icon = $icon ?? "";
		return $this;
	}

	public function excludeSerialNumber($exclude = false) {
		$this->_exlcudeSerialNumber = $exclude;
		return $this;
	}

	/**
	 * This method uses generator to build the data for memory consumption
	 * and performance
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	private function generateRowOptimizer(array $data) {
		$count = count($data);
		for ($i = 0; $i < $count; $i++) {
			yield $data[$i];
		}
	}

	private function generateBody($data, $exclusionArray = array(), $actionArray = array(), $icon = '') {
		$result = '<tbody>';
		if (empty($data) || $data == false) {
			$countHeader = count($this->_header);
			return "<tbody><tr><td colspan='$countHeader'><div class='alert alert-info text-dark text-center'>
			$icon<p>
			No " .
			removeUnderscore($this->_model) . " found...</p>" .
				"</div></td></tr></tbody>";
		}
		$arrayData = $this->generateRowOptimizer($data);
		$countData = count($data);
		$i = 0;

		foreach ($arrayData as $row) {
			$result .= $this->generateTableRow($row, $exclusionArray, $actionArray, @$_GET['p_start'] + $i);
			$i++;
		}

		// for ($i = 0; $i < $countData; $i++) {
		// 	$current = $data[$i];
		// 	$result.=$this->generateTableRow($current,$exclusionArray,$actionArray,@$_GET['p_start']+$i);
		// }
		$result .= '</tbody>';
		return $result;
	}

	private function generateTableRow($rowData, $exclusionArray, $actionArray, $index = false) {
		$id = $rowData->id;
		$result = "<tr data-row-identifier='{$id}'>";

		// this is to add multiple checkbox functionality
		if ($index !== false && !$this->_exlcudeSerialNumber) {
			$index += 1;
			$result .= "<td>$index</td>";
		}
		$model = $this->_modelObj;
		$documentArray = array_keys($model::$documentField);
		$labels = array_keys($model::$labelArray);
		for ($i = 0; $i < count($labels); $i++) {
			$key = $labels[$i];
			if ($key == 'ID' || in_array($key, $exclusionArray)) {
				continue;
			}
			$value = $rowData->$key;
			if (!empty($documentArray) && in_array($key, $documentArray)) {
				$link = '';
				$fileMsg = 'no image';
				if ($value != "") {
					$link = $value;
				}
				if ($link) {
					$typeExt = getMediaType($link);
					if (!startsWith($link, base_url())) {
						$link = base_url($link);
					}
					if ($typeExt == 'audio') {
						$fileMsg = 'Hear Audio';
						$value = $value = "<a href='$link' target='_blank'>$fileMsg</a>";
					} else if ($typeExt == 'image') {
						$fileMsg = 'View Image';
						$value = "<a href='$link' target='_blank'>$fileMsg</a>";
					} else if ($typeExt == 'video') {
						$fileMsg = 'View Video';
						$value = "<a href='$link' target='_blank'>$fileMsg</a>";
					} else {
						$value = "<a href='$link' target='_blank'>View</a>";
					}
				}
			}

			if (isset($model::$typeArray[$key]) && $model::$typeArray[$key] == 'tinyint') {
				$value = $value ? 1 : 0;
				if ($key == 'status') {
					$value = (!$value) ? $this->statusArray[$value] : $this->statusArray[$value];
				} else {
					$value = $this->booleanArray[$value];
				}
			}

			if (property_exists($model, 'translateFieldReadable')) {
				$translate = $model::$translateFieldReadable;
				if (!empty($translate)) {
					$this->tranlateValue($translate, [$model, $key, $value]);
					if ($translate && array_key_exists($key, $translate)) {
						$value = $translate[$key];
					}
				}
			}

			if ($value && strpos($value, 'href')) {
				$value = $value;
			} else {
				// $value = wordwrap($value,50,"<br />\n",true);
				$value = $value;
			}

			$result .= "<td>$value</td>";
		}

		if (!empty($actionArray) && $actionArray !== false) {
			$actionString = $this->generateActionHtml($rowData, $actionArray);
			$result .= $this->actionIcon($actionString);
		}
		$result .= "</tr>";
		return $result;
	}

	private function tranlateValue(array &$fieldArray, array $param) {
		$method = __CLASS__ . '::callTranslateMethod';
		array_walk($fieldArray, $method, $param);
	}

	private static function callTranslateMethod(&$item, $key, array $params) {
		[$entity, $field, $val] = $params;
		if ($key == $field) {
			$item = $entity->$item($val);
		}
	}

	public function appendQueryString(array $queryString = []) {
		$this->queryString = array_fill_keys($queryString, 'param');
		return $this;
	}

	private function htmlDropDownAction() {
		$result = "<a href='#' class='dropdown-toggle btn btn-icon btn-trigger' data-toggle='dropdown'>
		        <em class='icon ni ni-more-h'></em>
		    </a> ";
		return $result;
	}

	/**
	 * The action string itself
	 * @param  string $actionString
	 * @return string
	 */
	private function actionIcon($actionString) {
		$result = "<td class='action-column'><div class='dropdown dropup'>
					" . $this->htmlDropDownAction() . "
				$actionString
			</div>
		</td>";
		return $result;
	}

	private function closeTable() {
		return '</table></div></div>';
	}

	private function generateHeader($header, $action) {
		$sn = '';
		if (!$this->_exlcudeSerialNumber) {
			$sn = "<th>S/N</th>";
		}
		$result = "<thead>
			<tr> $sn";
		for ($i = 0; $i < count($header); $i++) {
			$item = $header[$i];
			$result .= "<th>$item</th>";
		}
		$actionText = '';
		if ($action !== false && !empty($action)) {
			$actionText = "<th>Action</th>";
		}
		$result .= "	$actionText
				</tr>
			</thead>";
		return $result;
	}

	/**
	 * This function generate page footer will link to navigate through the pages
	 * @param  int    $totalPage    [description]
	 * @param  int    $currentcount [description]
	 * @param  int    $pageLength   [description]
	 * @return [type]               [description]
	 */
	public function generatePagedFooter(int $totalPage, int $currentcount, int $pageLength) {
		$beginCount = 10;
		if ($totalPage <= $pageLength) {
			return;
		}
		$result = "<div class='paging'>
		<div>
			<div class='form_group'>
				<label class='col-sm-3 col-form-label'>Page Size :</label>
				<div class='col-sm-9'>
					<input class='form-control' type='text' style='width:50px;display:inline_block;background-color:white;' id='page_size' value='$pageLength' disabled/>
				</div>
			</div>
		</div>
			<ul class='pagination rounded-separated pagination-danger'>
			";
		// $pageArray=$this->generatePageArray($totalPage,$pageLength);
		$totalPaged = ceil($totalPage / $pageLength);
		$currentIndex = $this->calculateCurrentIndex($currentcount, $pageLength);
		$start = 0;
		if ($totalPaged > ($beginCount)) {
			$start = $currentIndex - (ceil($beginCount / 2) + 1); //half of the content before showing the current index
			$start = $start < 0 ? 0 : $start;
			// $len = $start+$beginCount;
			$prev = $currentIndex > 0 ? ($currentIndex - 1) : 0;
			$prev *= $pageLength;
			$disable = $prev == 0 ? 'disabled' : '';
			$result .= "<li data-start='$prev' data-length='$pageLength' class='page-item $disable'>«</li>";
			$len = $start + ceil($beginCount / 2);
			for ($i = $start; $i < $len; $i++) {
				$current = 1 + $i;
				$itemClass = 'page-item';
				if ($i == $currentIndex) {
					$itemClass = 'active page-item';
				}
				$end = $current * $pageLength;
				$result .= "<li data-start='$end' data-length='$pageLength' class='$itemClass '>
				<a class='page-link'> $current</a>
				</li>";
				// $start = $end;
			}
			$result .= "<li data-start='' data-length='$pageLength' class='page-item  break'>
			<a class='page-link'>...</a>
			</li>";
			$len = floor($beginCount / 2);
			$start = ($totalPaged - (1 + $len));
			$len += $start;
			for ($i = $start; $i < $len; $i++) {
				$current = 1 + $i;
				$itemClass = 'page-item';
				if ($i == $currentIndex) {
					$itemClass = 'page-item active';
				}
				$end = $current * $pageLength;
				$result .= "<li data-start='$end' data-length='$pageLength' class='$itemClass '>
				<a class='page-link'>$current</a>
				</li>";
				// $start = $end;
			}
			$prev = $currentIndex < $totalPaged ? ($currentIndex + 1) : $totalPaged - 1;
			$last = $prev * $pageLength;
			$result .= "<li data-start='$last' data-length='$pageLength' class='page-item'>
			<a class='page-link'>»</a>
			</li>";
			$len = $start + $beginCount;
		} else {
			for ($i = 0; $i <= $totalPaged; $i++) {
				$current = $i + 1;
				$itemClass = 'page-item';
				if ($i == $currentIndex) {
					$itemClass = 'page-item active';
				}
				$start = ($current > 1) ? ($current * $pageLength) - $pageLength : 0;
				$end = $start * $pageLength;
				$result .= "<li data-start='$end' data-length='$pageLength' class='$itemClass'>
				<a class='page-link' href='?p_start=" . $start . "&p_len=" . $pageLength . "'>$current</a>
				</li>";
				// $start = $end;
			}
		}
		$result .= "<div class='clear'></div></ul>
		</div>";
		return $result . "<div class='clear'></div>";
	}

	private function calculateCurrentIndex($current, $pageLength) {
		return ceil($current / $pageLength);
	}

	private function generatePageArray($totalPage, $pageLength) {
		$count = ceil(($totalPage / $pageLength));
		$result = array();
		for ($i = 0; $i < $count; $i++) {
			$result[] = $i + 1;
		}
		return $result;
	}

	//create another method to generate the needed javascript file for the paging this can be called independently of the getTableHtml function
	//this functin basically generates the javascript file needed to process  the action as well as the paging function search functionality will also be included automatically

	public function getJSData($actionArray) {

	}

	private function getHeader($exclusionArray = array(), $removeid = '') {
		$result = array();
		if (!$this->_model) {
			throw new \Exception("You must set the model by calling the openTableHeader method.");
		}
		$model = $this->entitiesNameSpace . ucfirst($this->_model);
		$labels = $model::$labelArray;
		foreach ($labels as $key => $value) {
			if ($key == 'ID' || in_array($key, $exclusionArray)) {
				//dont include the header if its an id field or
				continue;
			}
			if (empty($value)) {
				if ($removeid && endsWith($key, '_id')) {
					$key = substr($key, 0, strlen($key) - strlen('_id'));
				}
				$result[] = removeUnderscore($key);
			} else {
				$result[] = ucfirst($value);
			}
		}
		return $result;
	}

	//this function validate the correctnes of the moe
	private function validateModelNameAndAccess($modelname) {
		$message = '';
		if (empty($modelname)) {
			throw new \Exception("Empty model name not allowed");
			return false;
		}
		if (!is_subclass_of($this->entitiesNameSpace . ucfirst($modelname), $this->crudNameSpace)) {
			throw new \Exception("Model is not a crud: make sure the correct name of the model is entered");
			return false;
		}
		if (!$this->validateAccess($modelname)) {
			throw new \Exception("Access Denied");
			return false;
		}
		return true;
	}

	private function validateAccess($modelname) {
		return true; //for now. change the implementation later//the implementation will make a call to the accessControl model
	}

	private function clearVar() {
		$this->_model = null;
		$this->_modelObj = null;
		$this->_header = null;
		$this->_paged = false;
		$this->_start = 0;
		$this->_length = null;
		$this->_icon = '';
		$this->_actionArray = [];
		$this->_exclusionArray = [];
		$this->_tableAttr = [];
	}
}

?>