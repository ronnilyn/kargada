
<?php

  include '../config/config.php';
  class controller extends Connection{ 
      public function managecontroller(){ 
        $sql = "SELECT COUNT(id) AS totaldelivered FROM fms_g17_shipment_details WHERE status = 5";
        $stmt = $this->conn()->query($sql);
        $row = $stmt->fetch();
        $totaldelivered = $row['totaldelivered'];

        $sql = "SELECT COUNT(id) AS totalitems FROM fms_g17_items";
        $stmt = $this->conn()->query($sql);
        $row = $stmt->fetch();
        $totalitems = $row['totalitems'];


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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!--li>Products</li-->
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #17a2b8!important;color:#fff;">
              <div class="inner">
                <h3><?php echo $totaldelivered; ?></h3>

                <p>Total Delivered</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box" style="background-color: #ffc107!important;color:#000;">
              <div class="inner">
                <h3>₱ <?php echo $totalitems; ?></h3>

                <p>Total Items</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-bag"></i>
              </div>
              <a href="report.php" class="small-box-footer" style="color: #000;">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
    </section>
  </div>


</div>
<!-- ./wrapper -->

<?php include 'footer.php'; ?>
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


</body>
</html>

<?php } }

  $controller = new controller();
  $controller->managecontroller();
            
?>