<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Consumption Reports</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="../controller/consumptions_reportsController.php" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="project_list_id" class="col-sm-12">Title</label>
                  <div class="col-sm-12">
                    <input type="text" name="title" class="form-control" cols="30" rows="10">
                  </div>
                </div>
                <div class="form-group">
                  <label for="project_list_id" class="col-sm-12">Consumption Reports</label>
                  <div class="col-sm-12">
                    <textarea name="description" id="editor" cols="30" rows="10">
                    </textarea>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat add" name="add"><i class="fa fa-save"></i> Save</button>
          </form>
            </div>
        </div>
    </div>
</div>




<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Consumption Reports</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="../controller/consumptions_reportsController.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="edit_id" class="form-control" cols="30" rows="10">
                <div class="form-group">
                  <label for="project_list_id" class="col-sm-12">Title</label>
                  <div class="col-sm-12">
                    <input type="text" name="title" id="edit_title" class="form-control" cols="30" rows="10">
                  </div>
                </div>
                <div class="form-group">
                  <label for="project_list_id" class="col-sm-12">Consumption Reports</label>
                  <div class="col-sm-12 consumptions_reports_edit">
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat add" name="edit"><i class="fa fa-save"></i> Save</button>
          </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="../controller/consumptions_reportsController.php">
            <div class="modal-body">
                <input type="hidden" name="id" id="delete_id">
                <div class="text-center">
                    <p>DELETE CONSUMPTION REPORTS</p>
                    <h2 class="bold catname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              
            </div>
          </form>
        </div>
    </div>
</div>
