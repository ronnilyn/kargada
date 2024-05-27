

<?php
  include '../config/config.php';
  class data extends Connection{ 
      public function managedata(){ 

        $reference_code = $_GET['reference_code'];

        $sql = "SELECT * FROM fms_g17_status WHERE reference_code = '".$reference_code."' AND status = 1";
        $stmt = $this->conn()->query($sql); 
        $rowtrackingstatus = $stmt->fetch();
        $datetime1 = $rowtrackingstatus['datetime'];

        $sql = "SELECT * FROM fms_g17_status WHERE reference_code = '".$reference_code."' AND status = 2";
        $stmt = $this->conn()->query($sql); 
        $rowtrackingstatus = $stmt->fetch();
        $datetime2 = $rowtrackingstatus['datetime'];

        $sql = "SELECT * FROM fms_g17_status WHERE reference_code = '".$reference_code."' AND status = 3";
        $stmt = $this->conn()->query($sql); 
        $rowtrackingstatus = $stmt->fetch();
        $datetime3 = $rowtrackingstatus['datetime'];

        $sql = "SELECT * FROM fms_g17_status WHERE reference_code = '".$reference_code."' AND status = 4";
        $stmt = $this->conn()->query($sql); 
        $rowtrackingstatus = $stmt->fetch();
        $datetime4 = $rowtrackingstatus['datetime'];

        $sql = "SELECT * FROM fms_g17_status WHERE reference_code = '".$reference_code."' AND status = 5";
        $stmt = $this->conn()->query($sql); 
        $rowtrackingstatus = $stmt->fetch();
        $datetime5 = $rowtrackingstatus['datetime'];


        $sql = "SELECT * FROM fms_g17_shipment_details WHERE reference_code = ?";
        $stmt = $this->conn()->prepare($sql);
        $stmt->execute([$reference_code]);
        $row = $stmt->fetch();

        $customers_info_status = $row['status'];

         $status = "";
        if ($customers_info_status == 1) {
          $status =  "Confirmed Order";
        } else if ($customers_info_status == 2) {
          $status =  "Processing Order";
        } else if ($customers_info_status == 3) {
          $status =  "Quality Check";
        } else if ($customers_info_status == 4) {
          $status =  "Dispatched Item";
        } else if ($customers_info_status == 5) {
          $status =  "Product Delivered";
        }

        if ($customers_info_status == 1) {
          $backgroundColor1 = "background-color: #98D091;";
        } else if ($customers_info_status == 2) {
          $backgroundColor1 = "background-color: #98D091;";
          $backgroundColor2 = "background-color: #98D091;";
          $line1 = "background-color: #98D091;";
        } else if ($customers_info_status == 3) {
          $backgroundColor1 = "background-color: #98D091;";
          $backgroundColor2 = "background-color: #98D091;";
          $backgroundColor3 = "background-color: #98D091;";
          $line1= "background-color: #98D091;";
          $line2 = "background-color: #98D091;";
        } else if ($customers_info_status == 4) {
          $backgroundColor1 = "background-color: #98D091;";
          $backgroundColor2 = "background-color: #98D091;";
          $backgroundColor3 = "background-color: #98D091;";
          $backgroundColor4 = "background-color: #98D091;";
          $line1= "background-color: #98D091;";
          $line2 = "background-color: #98D091;";
          $line3 = "background-color: #98D091;";
        } else if ($customers_info_status == 5) {
          $backgroundColor1 = "background-color: #98D091;";
          $backgroundColor2 = "background-color: #98D091;";
          $backgroundColor3 = "background-color: #98D091;";
          $backgroundColor4 = "background-color: #98D091;";
          $backgroundColor5 = "background-color: #98D091;";
          $line1= "background-color: #98D091;";
          $line2 = "background-color: #98D091;";
          $line3 = "background-color: #98D091;";
          $line4 = "background-color: #98D091;";
        }
?>
<!DOCTYPE html>
<html>
<head><?php include 'head.php'; ?></head>
<body class="hold-transition skin-blue sidebar-mini">
  <style>

.header {
    margin-top: 2%;
    width: 100%;
    text-align: center;
}

.header h1 {
    font-family: 'Open Sans', sans-serif;
    line-height: 25px;
    text-transform: uppercase;
    color: grey;
}
.content {
    width: 100%;
    margin: 3% auto 0 auto;
    height: 460px;
    background-color: #F5F5F5;
}

.content1 {
    background-color: #98d091;
    text-align: center;
    padding: 2em;
}

.content1 h2 {
    font-family: 'Open Sans', sans-serif;
    text-transform: uppercase;
    margin: 0;
    color: #fff;
}
.content2 {
    background-color: #b5e6ae;
}
.content2-header1 {
    float: left;
    width: 50%;
    text-align: center;
    padding: 1.5em;
}
.content2-header1 p {
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #4E7D48;
    margin: 0;
}
.content2-header1 span {
    font-size: 14px;
    font-weight: 400;
}

.shipment {
    width: 100%;
    margin-top: 10%;
}



/*.confirm .imgcircle, .process .imgcircle, .quality .imgcircle {
    background-color: #98D091;
}*/

.imgcircle {
    height: 75px;
    width: 75px;
    border-radius: 50%;
    background-color: #F5998E;
    position: relative;
    display: grid;
    place-items:center;
}
.imgcircle img {
    height: 30px;
    position: absolute;
    top: 28%;
    left: 30%;
}

/*.confirm span.line, .process span.line {
    background-color: #98D091;
}*/

span.line {
    height: 5px;
    width: 90px;
    background-color: #F5998E;
    display: block;
    position: absolute;
    top: 28%;
    left: 45%;
}

.content3 p {
    margin-left: -70%;
    font-size: 15px;
    font-weight: 600;
}


.confirm {
    text-align: center;
    width: 20%;
    position: relative;
    float: left;
    margin-left: 5%;
}

.process {
    position: relative;
    width: 20%;
    text-align: center;
    float: left;
}

.quality {
    position: relative;
    width: 20%;
    text-align: center;
    float: left;
}
.dispatch {
    position: relative;
    width: 20%;
    text-align: center;
    float: left;
}
.delivery {
    position: relative;
    width: 20%;
    text-align: center;
    float: left;
    margin-right: -9%;
}
.clear {
    clear: both;
}



@media screen and (max-width: 991px){
    .imgcircle {
    height: 50px;
    width: 50px;
    padding-bottom: 10px;
}

span.line {
    width: 50px;
}

.imgcircle .fas{
    font-size: 1.5rem !important;
}

.shipment p{
    font-size: 8px;
    text-align: center;
    width: 100%;
}
.content3 p {
    margin-left: unset;
    font-size: 15px;
    font-weight: 600;
}



.confirm,.process,.quality,.dispatch,.delivery{
    text-align: center;
    width: 100%;
    margin: auto !important;
    float: unset;
    margin-left: unset;
    text-align: center;
    padding: 20px 0px;

}

.imgcircle {
  
    border-radius: 50%;
    background-color: #F5998E;
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    display: grid;
 
}

span.line {
    height: 30px;
    width: 5px;
    top: 80%;
    left: 50%;
    transform: translateX(-50%);
}


.orderstrackstatus{
    margin-top: 10rem !important;
}

.content {
    height: 100%;
    padding-bottom: 50px;
}

.fa-check-double{
  font-size: 17px;
}
}

  </style>
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
            <div class="content3">
              <div class="shipment" style="margin-top: 3%;">
                <div class="confirm">
                          <div class="imgcircle" style="<?php echo $backgroundColor1; ?>">
                            <i class="fas fa-check-circle text-white h2 m-0"></i>
                        </div>
                  <span class="line" style="<?php echo $line1; ?>"></span>
                  <p class="confirmtext">Confirmed Order<br><small><?php echo $datetime1 ?></small></p>
                </div>
                <div class="process">
                        <div class="imgcircle" style="<?php echo $backgroundColor2; ?>">
                            <i class="fas fa-chalkboard-teacher text-white h2 m-0"></i>
                        </div>
                  <span class="line" style="<?php echo $line2; ?>"></span>
                  <p>Processing Order<br><small><?php echo $datetime2 ?></small></p>
                </div>
                <div class="quality">
                  <div class="imgcircle" style="<?php echo $backgroundColor3; ?>">
                            <i class="far fa-check-double text-white h2 m-0"></i>
                        </div>
                  <span class="line" style="<?php echo $line3; ?>"></span>
                  <p>Quality Check<br><small><?php echo $datetime3 ?></small></p>
                </div>
                <div class="dispatch">
                  <div class="imgcircle" style="<?php echo $backgroundColor4; ?>">
                            <i class="fas fa-truck text-white h2 m-0"></i>
                        </div>
                  <span class="line" style="<?php echo $line4; ?>"></span>
                  <p>Dispatched Item<br><small><?php echo $datetime4 ?></small></p>
                </div>
                <div class="delivery">
                  <div class="imgcircle" style="<?php echo $backgroundColor5; ?>">
                            <i class="fas fa-truck-loading text-white h2 m-0"></i>
                  </div>
                  <p>Product Delivered<br><small><?php echo $datetime5 ?></small></p>
                </div>
                <div class="clear"></div>
              </div>
          </div>
            <div class="box-header with-border">
              <?php $sql = "SELECT * FROM fms_g17_shipment_details WHERE reference_code = '".$_GET['reference_code']."'";
              $stmt = $this->conn()->query($sql);
              $row = $stmt->fetch(); ?>

              <?php $sql2 = "SELECT * FROM fms_g17_shipment WHERE reference_code = '".$_GET['reference_code']."' ORDER BY id DESC";
              $stmt2 = $this->conn()->query($sql2);
              $row2 = $stmt2->fetch(); ?>
              <h1 style="font-size: 20px;">Reference Code: <span style="font-weight: bold;"><?php echo $_GET['reference_code']; ?></span></h1>
              <table class="table table-bordered">
                <tr>
                  <th colspan="2">Sender Information</th>
                  <th colspan="2">Receiver Information</th>
                </tr>
                <tr>
                  <td colspan="2"><?php echo $row['sender_fullname'] ?></td>
                  <td colspan="2"><?php echo $row['receiver_fullname'] ?></td>
                </tr>
                <tr>
                  <td colspan="2"><?php echo $row['sender_contact'] ?></td>
                  <td colspan="2"><?php echo $row['receiver_contact'] ?></td>
                </tr>
                <tr>
                  <td colspan="2"><?php echo $row['sender_address'] ?></td>
                  <td colspan="2"><?php echo $row['receiver_address'] ?></td>
                </tr>
                <tr>
                  <td colspan="2"><?php echo $row['sender_tin'] ?></td>
                  <td colspan="2"></td>
                </tr>
                <tr>
                  <th colspan="4"></th>
                </tr>

                <?php if ($stmt2->rowcount() > 0) { ?>
                  <tr>
                    <th>Shipment From: <?php echo $row2['shipmentfrom'] ?></th>
                    <th>Shipment To: <?php echo $row2['shipmentto'] ?></th>
                    <th>Vehicle Type: <?php echo $row2['vehicletype'] ?></th>
                  </tr>
                <?php } else { ?>
                  <tr>
                    <th>Shipment From: ---</th>
                    <th>Shipment To: ---</th>
                    <th>Vehicle Type: ---</th>
                  </tr>
                <?php } ?>
                
              </table>
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
          $sql = "SELECT * FROM fms_g17_items WHERE reference_code = '".$_GET['reference_code']."'";
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