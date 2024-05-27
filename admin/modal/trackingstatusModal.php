<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Location</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/shipmentController.php" enctype="multipart/form-data">
                <input type="hidden" id="edit_reference_code" name="reference_code">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Shipment From</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="shipmentfrom" required>
                        <option value="">Select</option>
                        <option value="Central Storage Hub">Central Storage Hub</option>
                        <option value="Metro Logistics Center">Metro Logistics Center</option>
                        <option value="Coastal Distribution Warehouse">Coastal Distribution Warehouse</option>
                        <option value="Inland Express Depot">Inland Express Depot</option>
                        <option value="Urban Fulfillment Center">Urban Fulfillment Center</option>
                        <option value="Summit Logistics Facility">Summit Logistics Facility</option>
                        <option value="Valley Storage Solutions">Valley Storage Solutions</option>
                        <option value="Prime Cargo Warehouse">Prime Cargo Warehouse</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="services_price" class="col-sm-3 control-label">Shipment To</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="shipmentto" required>
                        <option value="">Select</option>
                        <option value="Central Storage Hub">Central Storage Hub</option>
                        <option value="Metro Logistics Center">Metro Logistics Center</option>
                        <option value="Coastal Distribution Warehouse">Coastal Distribution Warehouse</option>
                        <option value="Inland Express Depot">Inland Express Depot</option>
                        <option value="Urban Fulfillment Center">Urban Fulfillment Center</option>
                        <option value="Summit Logistics Facility">Summit Logistics Facility</option>
                        <option value="Valley Storage Solutions">Valley Storage Solutions</option>
                        <option value="Prime Cargo Warehouse">Prime Cargo Warehouse</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="services_price" class="col-sm-3 control-label">Vehicle Type</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="vehicletype" required>
                        <option value="">Select</option>
                        <option value="Truck 6x6">Truck 6x6</option>
                        <option value="Truck 8x8">Truck 8x8</option>
                        <option value="Van">Van</option>
                        <option value="Motorcycle">Motorcycle</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="set"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="status">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Update Status</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="../controller/shipmentController.php" enctype="multipart/form-data">
                <input type="hidden" id="status_reference_code" name="reference_code">
                <div class="form-group">
                    <label for="title" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="status" required>
                        <option value="">Select</option>
                        <option value="1">Confirmed Order</option>
                        <option value="2">Processing Order</option>
                        <option value="3">Quality Check</option>
                        <option value="4">Dispatched Item</option>
                        <option value="5">Product Delivered</option>
                      </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="setstatus"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>