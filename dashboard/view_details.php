

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="fontawesome.js"></script>
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
</head>
<style>

.wrappercircle{
    background-color: red;
    width: 100%;
    display: flex;
    place-items: center;
    text-align: center;
    justify-content: center;
}
.circle{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: green;
}
.line{
    width: 70px;
    height: 5px;
    background-color: green;
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
    display: flex;
    justify-content: center;
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
    width: 15%;
    position: relative;
    float: left;
    margin-left: 5%;
}

.process {
    position: relative;
    width: 15%;
    text-align: center;
    float: left;
}

.quality {
    position: relative;
    width: 15%;
    text-align: center;
    float: left;
}
.dispatch {
    position: relative;
    width: 15%;
    text-align: center;
    float: left;
}
.delivery {
    position: relative;
    width: 15%;
    text-align: center;
    float: left;
    margin-right: -9%;
}
.clear {
    clear: both;
}



@media screen and (max-width: 1260px){


.imgcircle .fas{
    font-size: 1.5rem !important;
}

.shipment p{
    font-size: 8px;
    text-align: center;
    width: 100%;
}
.content3 p {
    margin-left: -20%;
    font-size: 13px;
    font-weight: 600;
}

.confirm,.process,.quality,.dispatch,.delivery{
    width: 20%;
    padding: 20px 0px;
}


span.line {

    width: 90px;
    top: 36%;
    left: 45%;
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


@media screen and (max-width: 1024px){


.imgcircle .fas{
    font-size: 1.5rem !important;
}

.shipment p{
    font-size: 8px;
    text-align: center;
    width: 100%;
}
.content3 p {
    margin-left: -20%;
    font-size: 13px;
    font-weight: 600;
}

.confirm,.process,.quality,.dispatch,.delivery{
    padding: 20px 0px;
}


span.line {

    width: 90px;
    top: 36%;
    left: 45%;
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
    padding-top: 10px;
 
}

span.line {
    height: 30px;
    width: 5px;
    top: 85%;
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
.shipment {
    display: unset;
}
}

  </style>
<body>

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content" style="height: 100%;">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count"></span>
                <div class="notif-wrapper">
                    <div class="notif-title">
                        <h3>Notification</h3>
                    </div>
                    <hr>
                    <div class="notif-list" id="style-1">
                        <div class="force-overflow">
                        <?php $sql = "SELECT * FROM fms_g17_notification";
                        $stmt = $this->conn()->query($sql);
                        while ($row = $stmt->fetch()) { ?>
                            <div class="notif-content-wrapper">
                                <div class="notif-content">
                                    <div><small style="font-size: 12px;"><?php echo $row['description'] ?></small></div>
                                    <small style="font-size: 10px;color: #c0c0c0;"><?php echo $row['date_created'] ?></small>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                        </div>
                        
                    </div>
                </div>
            </a>
            <a href="#" class="profile">
                <img src="images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1>View Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">View Details</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>View Details</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
        

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

              <?php $sql2 = "SELECT * FROM fms_g17_shipment INNER JOIN fms_g17_vehicle ON fms_g17_shipment.vehicle_id=fms_g17_vehicle.vehicle_id WHERE fms_g17_shipment.reference_code = '".$_GET['reference_code']."' ORDER BY id DESC";
              $stmt2 = $this->conn()->query($sql2);
              $row2 = $stmt2->fetch(); ?>

              <?php $sql3 = "SELECT * FROM fms_g17_shipment INNER JOIN fms_g17_vehicle ON fms_g17_shipment.vehicle_id=fms_g17_vehicle.vehicle_id WHERE reference_code = '".$_GET['reference_code']."' ORDER BY id ASC";
              $stmt3 = $this->conn()->query($sql3); ?>
              <h1 style="font-size: 20px;">Reference Code: <span style="font-weight: bold;"><?php echo $_GET['reference_code']; ?></span></h1>
              <table class="table table-bordered">
                <tr>
                  <th colspan="1">Sender Information</th>
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
                    <th>Vehicle Type: <?php echo $row2['name'] ?></th>
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
            <div class="bottom-data">
                <div class="orders" style="background-color: #eee;">
                    <h3>Product</h3>
                    <br>
                    <div class="header" style="display: block;width: 100%;">
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
                                <?php $sql = "SELECT * FROM fms_g17_items WHERE reference_code = '".$_GET['reference_code']."'";
                                $stmt = $this->conn()->query($sql);
                                while ($row = $stmt->fetch()) { ?>
                                  <tr>
                                    <td><?php echo $row['itemname'] ?></td>
                                    <td><?php echo $row['description'] ?></td>
                                    <td><?php echo $row['length'] ?></td>
                                    <td><?php echo $row['width'] ?></td>
                                    <td><?php echo $row['height'] ?></td>
                                  </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="orders" style="background-color: #eee;">
                    <h3>Shipment For - <small class="badge" style="background-color:#f44336;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Inbound - Outbound</small></h3>
                    <br>
                    <div class="header" style="display: block;width: 100%;">
                        <div class="box-body table-responsive">
                          <table id="example1" class="table table-bordered">
                            <thead>
                              <th>Shipment From</th>
                              <th>Shipment To</th>
                              <th>Vehicle Type</th>
                            </thead>
                            <tbody>
                                <?php while ($row = $stmt3->fetch()) { ?>
                                  <tr>
                                    <td><?php echo $row['shipmentfrom'] ?></td>
                                    <td><?php echo $row['shipmentto'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                  </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                    </div>
                     </div>
                    </div>



  



                    </div>
                </div>

         

            </div>

        </main>

    </div>

    <script src="index.js"></script>
</body>

</html>
     <?php
                      }
                        
                  }

                    $data = new data();
                    $data->managedata();
                              
                  ?>