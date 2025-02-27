<!-- main header @s -->
<?php
require_once APPPATH . 'Views/modelconfig/table.php';
require_once APPPATH . 'Views/modelconfig/form.php';
require_once ROOTPATH . 'template/header.php';
?>
<!-- main header @e -->
<?php
$tempModel = $modelName;
$modelName = removeUnderscore($modelName);
?>
<!-- content @s -->
<div class="nk-content ">
<div class="container-fluid">
<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
              <h4 class="nk-block-title page-title"><?php echo isset($pageTitle) ? ucwords($pageTitle) : ucfirst(removeUnderscore(@$modelName)); ?></h4>
            </div><!-- .nk-block-head-content -->
            <!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
              <div class="toggle-wrap nk-block-tools-toggle">
                  <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                  <div class="toggle-expand-content" data-content="more-options">
                      <ul class="nk-block-tools g-3">
                          <li class="nk-block-tools-opt">
                            <?php if ($show_add): ?>
                            <div class="float-right align-self-end mb-4">
                              <a href="#" class="btn btn-icon btn-primary d-md-none mx-2 px-2" data-toggle='modal' data-target='#myModal'><em class="icon ni ni-plus"></em> Add</a>
                              <a href="#" class="btn btn-primary d-none d-md-inline-flex" data-toggle='modal' data-target='#myModal'><em class="icon ni ni-plus"></em><span>Add</span>
                              </a>
                            </div>
                            <?php endif;?>
                          </li>
                      </ul>
                  </div>
              </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
    <div class="card card-preview">
    <div class="card-inner">
    <div class="preview-block">
    <div class="row g-gs">
    <div class="col-sm-12">
        <div class="card card-preview">
            <?php if (isset($showViewCount) && $showViewCount): ?>
            <div class="card-inner">
                <div class="card-title-group align-start mb-2">
                    <div class="card-title">
                        <h6 class="title"><?=$modelStatTitle;?></h6>
                    </div>
                    <div class="card-tools">
                        <em class="card-hint icon ni ni-help-fill" data-toggle="tooltip" data-placement="left" title="<?=$modelStatToolTip?>"></em>
                    </div>
                </div>
                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                    <div class="nk-sale-data">
                        <span class="amount"><?php echo number_format($customerCount); ?></span>
                    </div>
                </div>
            </div>
            <?php endif;?>

            <div class="card-inner">
              <?php if ($tempModel == 'cashback'): ?>
              <form action="" method="get" id="model-transaction-form">
                  <div class="row mb-3">
                      <div class="col-lg-3 mb-3">
                          <div class="form-group">
                              <label class="form-label">Start Date</label>
                              <div class="form-control-wrap">
                                  <div class="form-icon form-icon-left">
                                      <em class="icon ni ni-calendar"></em>
                                  </div>
                                  <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="startDate">
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-3 mb-3">
                          <div class="form-group">
                              <label class="form-label">End Date</label>
                              <div class="form-control-wrap">
                                  <div class="form-icon form-icon-left">
                                      <em class="icon ni ni-calendar"></em>
                                  </div>
                                  <input type="text" class="form-control date-picker" data-date-format="yyyy-mm-dd" name="endDate">
                              </div>
                          </div>
                      </div>
                      <input type="hidden" name="type" value="<?=@$_GET['type'];?>">
                      <div class="col-lg-3">
                          <div class="form-group">
                              <label class="form-label"></label>
                              <div class="form-control-wrap mt-1">
                                  <button type='submit' class="btn btn-primary save">Submit</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
              <?php endif;?>

                <?php
$type = @$_GET['type'] ?? null;
$enableParam = [];
$action = [
	'edit' => "edit/{$tempModel}",
];

$param = !empty($dataParam) ? array($dataParam) : array();
$tableData = $queryHtmlTableObjModel->openTableHeader($queryString, $param, null, array('id' => 'datatable-external-buttons', 'class' => 'datatable-init nowrap nk-tb-list is-separate table table-bordered table-responsive ', "data-auto-responsive" => 'false'),
	$tableExclude
)
// ->paging(true,0,10)
	->excludeSerialNumber(false)
	->appendTableAction($tableAction)
	->appendQueryString($tableQueryString)
	->generateTable();
echo $tableData;
?>
            </div>
        </div><!-- .card-preview -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div><!-- .nk-block -->
</div>
</div>
</div>
</div>
<!-- content @e -->

<!-- add modal -->
<div class="modal fade" tabindex="-1" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-top" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"><?php echo removeUnderscore($tempModel); ?> Record Form</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                  <em class="icon ni ni-cross"></em>
              </a>
          </div>
          <div class="modal-body">
            <?php
$modelPath = null;
$extra = "";

$formContent = $modelFormBuilder->start($tempModel . '_table')
	->appendInsertForm($tempModel, true, $hidden, '', $showStatus, $exclude)
	->addSubmitLink($modelPath)
	->appendExtra($extra)
	->appendResetButton('Reset', 'btn btn-lg btn-danger')
	->appendSubmitButton($submitLabel, 'btn btn-lg btn-primary')
	->build();
echo $formContent;
?>
          </div>
      </div>
  </div>
</div>


<!-- this is for edit modal form -->
<div id="modal-edit" class="modal fade animated" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Record</h5>
            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
            </a>
        </div>
        <div class="modal-body">
            <p id="edit-container"> </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" id="close" data-dismiss="modal">Close
            </button>
        </div>
    </div>
  </div>
</div>
<!-- end edit modal form -->

<!-- JavaScript -->
<?php include_once ROOTPATH . 'template/footer.php';?>
<script>
    var inserted=false;

    $(document).ready(function() {
      $('.modal').on('hidden.bs.modal', function (e) {
        if (inserted) {
          inserted = false;
          location.reload();
        }
      });
      $('.close').click(function(event) {
        if (inserted) {
          inserted = false;
          location.reload();
        }
      });
    });

    function showUpdateForm(target,data) {
      var data = JSON.parse(data);
      if (data.status==false) {
        showNotification(false,data.message);
        return;
      }

       var container = $('#edit-container');
       container.html(data.message);
       //rebind the autoload functions inside
      $('#modal-edit').modal('show');
    }

    function ajaxFormSuccess(target,data) {
      data = JSON.parse(data);
      if (data.status) {
        inserted=true;
        $('form').trigger('reset');
      }
      showNotification(data.status,data.message);
      var btnSubmit = $('input[type=submit]');
      btnSubmit.removeClass('disabled');
      btnSubmit.prop('disabled', false);
      btnSubmit.html('Submit');
      if (typeof target ==='undefined') {
        location.reload();
      }
      if(data.status){
        location.reload();
      }
    }
</script>