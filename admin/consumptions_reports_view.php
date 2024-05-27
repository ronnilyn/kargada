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
        Notification
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Notification</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered">
                <thead>

                </thead>
                <tbody>


          <?php
          $sql = "SELECT * FROM fms_g17_consumptions_reports WHERE id = '".$_GET['all_id']."'";
          $stmt = $this->conn()->query($sql);
          $id = 1;
          while ($row = $stmt->fetch()) { ?>
        
                          <tr>
                            <th><?php echo $row['title'] ?></th>
                          </tr>
                          <tr>
                            <td><?php echo $row['description'] ?></td>
                          </tr>
    
                      <?php 
                      $id++;
                          } ?>


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
<?php include 'modal/consumptions_reportsModal.php'; ?>
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
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

<script>

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var edit_title = $(this).data('edit_title');
    var edit_id = $(this).data('edit_id');

    $('#edit_title').val(edit_title)
    $('#edit_id').val(edit_id)
    
    $.ajax({
      url: 'consumptions_reports_edit.php',
      type: 'POST',
      data:{id:edit_id},
      success:function(data){
        $('.consumptions_reports_edit').html(data)
      }
    })
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var delete_id = $(this).data('delete_id');

    $('#delete_id').val(delete_id)
  });

</script>


<script>
  CKEDITOR.replace('editor');

</script>

<!-- Data Table Initialize -->
<script>
  $(function () {
    $('#example1').DataTable({
    
    })
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