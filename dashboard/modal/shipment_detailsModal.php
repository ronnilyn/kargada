<div id="location" class="modal-window">
  <div>
    <a href="#" title="Close" class="modal-close">Close</a>
    <br>
    <h3>Vehicle Form</h3>
    <br>
<!-- driver_id
vehicle_id
destination
vehicle_status
 -->
    <div>
        <form class="form-horizontal" method="POST" action="../controller/vehicleController.php" enctype="multipart/form-data">
            <div class="input-field">
              <select  name="driver_id">
                <option value="">Select Driver</option>
                <?php $sql = "SELECT * FROM fms_g17_users WHERE type = 1";
                $stmt = $this->conn()->query($sql);
                while ($row = $stmt->fetch()) { ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['user_first_name'] ?> <?php echo $row['user_last_name'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input-field">
              <input type="text" name="vehicle_id" placeholder="Vehicle ID" />
            </div>
            <div class="input-field">
              <input type="text" name="destination" placeholder="Destination" />
            </div>
            <div class="input-field">
              <select name="vehicle_status">
                <option value="">Select Status</option>
                <option value="Active">Active</option>
                <option value="Idle">Idle</option>
                <option value="Transit">Transit</option>
              </select>
            </div>
            <div style="text-align: right;">
                <button type="submit" class="btn" name="add" style="background-color: #2e3833;color: #fff;">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>