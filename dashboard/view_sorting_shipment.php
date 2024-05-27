
<?php

  include '../config/config.php';
  class controller extends Connection{ 
      public function managecontroller(){ 


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Responsive Dashboard Design #2 | AsmrProg</title>
</head>

<body>

    <!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
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
                    <h1>Sorting Shipment Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Sorting Shipment Details</a></li>
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
                            <h3>All Sorting Shipment Details</h3>
                            <i class='bx bx-filter'></i>
                            <i class='bx bx-search'></i>
                        </div>
                        <table>
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

              $sql = "SELECT * FROM fms_g17_shipment_details WHERE status != 5 AND shipmentto = '".$_GET['shipmentto']."'";
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
                                    <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Pending</small>
                                  <?php } else if ($row['status'] == 1) { ?> 
                                    <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Confirmed</small>
                                  <?php } else if ($row['status'] == 2) { ?> 
                                  <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Process</small>
                                  <?php } else if ($row['status'] == 3) { ?> 
                                  <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Quality Check</small>
                                  <?php } else if ($row['status'] == 4) { ?> 
                                  <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Dispatched</small>
                                  <?php } ?></td>
                                <td>
                                  <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_details.php?reference_code=<?php echo $row['reference_code'] ?>"><i class="fa fa-eye"></i> View</a>


                                </td>
                              </tr>
        
                          <?php } ?>



                            </tbody>
                       </table>
                    </div>
            </div>

        </main>

    </div>


    <script src="index.js"></script>
</body>

</html>

<?php } }

  $controller = new controller();
  $controller->managecontroller();
            
?>