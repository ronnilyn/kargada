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
        Items
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Items</li>
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
                  <th>Items</th>
                  <th>Description</th>
                  <th>Length</th>
                  <th>Width</th>
                  <th>Height</th>
                </thead>
                <tbody>


<?php
          $sql = "SELECT * FROM fms_g17_items";
          $stmt = $this->conn()->query($sql);
          while ($row = $stmt->fetch()) { ?>
        
                          <tr>
                            <td><?php echo $row['itemname'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['length'] ?></td>
                            <td><?php echo $row['width'] ?></td>
                            <td><?php echo $row['height'] ?></td>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


<script>


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'category_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.catid').val(response.id_menu);
      $('#edit_name').val(response.name_menu);
      $('.catname').html(response.name_menu);
    }
  });
}


</script>
</body>
</html>
     <?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>