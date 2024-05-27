

<?php
  include '../config/config.php';
  class category extends Connection{ 
      public function managecategory(){ 
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
        Customers
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--li>Products</li-->
        <li class="active">Customers</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
        <!--       <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a> -->
            </div>
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Images</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <th>Address</th>
                </thead>
                <tbody>


<?php
          
          $sql = "SELECT * FROM fms_g17_users WHERE id = '".$_SESSION['id']."'";
          $stmt = $this->conn()->query($sql);
          $row = $stmt->fetch();

          $sql = "SELECT * FROM users WHERE type = 1";
          $stmt = $this->conn()->query($sql);
          while ($row = $stmt->fetch()) { ?>
        
                          <tr>
                            <td><img src="../images/<?php echo $row['img'] ?>" width="100px"></td>
                            <td><?php echo $row['user_first_name'] ?></td>
                            <td><?php echo $row['user_email_address'] ?></td>
                            <td><?php echo $row['user_contact'] ?></td>
                            <td><?php echo $row['user_address'] ?></td>
                          <!--   <td>
                              <a href="usersController.php?id=<?php echo $row['id'] ?>" class='btn btn-warning btn-sm btn-flat' 
                              ><i class="fas fa-tasks"></i> Users</a>
                            </td> -->
                          </tr>
    
                      <?php 
                          }


                      }
                        
                  }

                    $category = new category();
                    $category->managecategory();
                              
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>All rights reserved</b>
        </div>
         <strong>Copyright &copy; 2020 <!--a href="https://www.facebook.com/BermzISware">Bermz ISware Solutions</a--></strong>
    </footer>    <!-- Add -->


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
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var edit_id = $(this).data('edit_id');
    var edit_fromdate = $(this).data('edit_fromdate');
    var edit_todate = $(this).data('edit_todate');
    var edit_semester = $(this).data('edit_semester');

    $('#edit_id').val(edit_id)
    $('#edit_fromdate').val(edit_fromdate)
    $('#edit_todate').val(edit_todate)
    $('#edit_semester').val(edit_semester)

    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var delete_id = $(this).data('delete_id');

    $('#delete_id').val(delete_id)

    getRow(id);
  });

});

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
