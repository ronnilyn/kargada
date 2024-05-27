

<?php
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){ 
?>
<!DOCTYPE html>
<html>
<head><?php include 'head.php'; ?></head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<?php include 'navbar.php'; ?>
<?php include 'profile.php'; ?>
<?php include 'sidebar.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Shipment Details
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Shipment Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a> -->
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Reference Code</th>
                  <th>Receiver Fullname</th>
                  <th>Receiver Contact</th>
                  <th>Receiver Address</th>
                  <th>Sender Fullname</th>
                  <th>Sender Contact</th>
                  <th>Sender Address</th>
                  <th>Sender Tin</th>
                  <th>Status</th>
                  <th>Tools</th>
                </thead>
                <tbody>


<?php

          $sql = "SELECT * FROM fms_g17_shipment_details WHERE status != 5";
          $stmt = $this->conn()->query($sql);
          while ($row = $stmt->fetch()) { ?>
                          <tr>
                            <td><?php echo $row['reference_code'] ?></td>
                            <td><?php echo $row['receiver_fullname'] ?></td>
                            <td><?php echo $row['receiver_contact'] ?></td>
                            <td><?php echo $row['receiver_address'] ?></td>
                            <td><?php echo $row['sender_fullname'] ?></td>
                            <td><?php echo $row['sender_contact'] ?></td>
                            <td><?php echo $row['sender_address'] ?></td>
                            <td><?php echo $row['sender_tin'] ?></td>
                            <td>
                              <?php if ($row['status'] == 0) { ?>
                                <span class="badge" style="background-color:#4caf50;">Pending</span>
                              <?php } else if ($row['status'] == 1) { ?> 
                                <span class="badge" style="background-color:#4caf50;">Confirmed</span>
                              <?php } else if ($row['status'] == 2) { ?> 
                              <span class="badge" style="background-color:#4caf50;">Process</span>
                              <?php } else if ($row['status'] == 3) { ?> 
                              <span class="badge" style="background-color:#4caf50;">Quality Check</span>
                              <?php } else if ($row['status'] == 4) { ?> 
                              <span class="badge" style="background-color:#4caf50;">Dispatched</span>
                              <?php } ?></td>
                            <td>
                              <a class="btn" style="background-color: #2e3833;color: #fff;" href="view_details.php?reference_code=<?php echo $row['reference_code'] ?>"><i class="fa fa-eye"></i> View</a>

                              <button class='btn edit' style="background-color: #2e3833;color: #fff;"

                              data-edit_reference_code='<?php echo $row['reference_code'] ?>'

                              ><i class='fa fa-edit'></i> Location</button>

                              <button class='btn status' style="background-color: #2e3833;color: #fff;"

                              data-status_reference_code='<?php echo $row['reference_code'] ?>'

                              > Status</button>

                            </td>
                          </tr>
    
                      <?php 

                          }
                          ?>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

</div>
<!-- ./wrapper -->

<?php include 'footer.php'; ?>
<?php include 'modal/trackingstatusModal.php'; ?>
<!-- Active Script -->
<script>


    $(document).on('click', '#admin_profile', function(e){
    e.preventDefault();
    $('#profile').modal('show');
    var user_id = $(this).data('user_id');
    var name = $(this).data('name');
    var email = $(this).data('email');
    var password = $(this).data('password');

    $('#user_id').val(user_id)
    $('#name').val(name)
    $('#email').val(email)
    $('#password').val(password)

    getRow(id);
  });
$(function(){
  /** add active class and stay opened when selected */
  var url = window.location;
  
  // for sidebar menu entirely but not cover treeview
  $('ul.sidebar-menu a').filter(function() {
      return this.href == url;
  }).parent().addClass('active');

  // for treeview
  $('ul.treeview-menu a').filter(function() {
      return this.href == url;
  }).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

});
</script>
<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true
    })

    $(document).on('click', '.edit', function(e){
      e.preventDefault();
      $('#edit').modal('show');

      var edit_reference_code = $(this).data('edit_reference_code');

      $('#edit_reference_code').val(edit_reference_code)

    });

    $(document).on('click', '.status', function(e){
      e.preventDefault();
      $('#status').modal('show');

      var status_reference_code = $(this).data('status_reference_code');

      $('#status_reference_code').val(status_reference_code)

    });
  })




</script>


</body>
</html>
     <?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>