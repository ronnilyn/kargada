
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
                    <h1>Shipment Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Shipment Details</a></li>
                    </ul>
                </div>
                <a href="#" class="report">
                    <i class='bx bx-cloud-download'></i>
                    <span>Download CSV</span>
                </a>
            </div>

            <div class="bottom-data">

                <?php if (isset($_GET['location'])) { ?>
                    <div class="orders">
                        <div class="header">
                            <h3>Location</h3>
                        </div>
                        <div class="header" style="display: block;width: 100%;">
                            <form method="POST" action="../controller/shipmentController.php" enctype="multipart/form-data">
                                <input type="hidden" name="reference_code" value="<?php echo $_GET['location'] ?>">
                                <div>
                                    Shipment From
                                    <div class="input-field" style="max-width: unset;">
                                      <select class="form-control" name="shipmentfrom" required>
                                        <option value="Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila">Kargada Warehouse: Andres Soriano Avenue Barangay 655, Manila</option>
                                      </select>
                                    </div>
                                </div>
                                <div>
                                    Shipment To
                                    <div class="input-field" style="max-width: unset;">
                                      <select class="form-control" name="shipmentto" required>
                                        <option value="">Select</option>
                                        <option value="Warehouse A - 150 D. Aquino St, Grace Park West, Caloocan, 1406 Metro Manila">Warehouse A - 150 D. Aquino St, Grace Park West, Caloocan, 1406 Metro Manila</option>
                                        <option value="Warehouse B - BLK 15 LOT 1, BRIÑAS CORNER BANZON ST, BF Resort Dr, Las Piñas, 1747 Metro Manila">Warehouse B - BLK 15 LOT 1, BRIÑAS CORNER BANZON ST, BF Resort Dr, Las Piñas, 1747 Metro Manila</option>
                                        <option value="Warehouse X - Silangan Warehousing, Calamba, 4027 Laguna">Warehouse X - Silangan Warehousing, Calamba, 4027 Laguna</option>
                                        <option value="Warehouse Y - 5 Daisy Panacal Vill. P.C. 3500, Tuguegarao City, Cagayan">Warehouse Y - 5 Daisy Panacal Vill. P.C. 3500, Tuguegarao City, Cagayan</option>
                                        <option value="Warehouse M - 14 Lavilles Street, Mj Cuenco Avenue. P.C. 6000, Cebu City, Cebu.">Warehouse M - 14 Lavilles Street, Mj Cuenco Avenue. P.C. 6000, Cebu City, Cebu.</option>
                                        <option value="Warehouse N - 347115 Rizal St, Lapuz, Iloilo City, Iloilo">Warehouse N - 347115 Rizal St, Lapuz, Iloilo City, Iloilo</option>
                                        <option value="Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur">Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur</option>
                                        <option value="Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su">Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su</option>
                         
                                      </select>
                                    </div>
                                </div>
                                <div>
                                    Vehicle Type
                                    <div class="input-field" style="max-width: unset;">
                                      <select class="form-control" name="vehicle_id" required>
                                        <option value="">Select</option>
                                        <?php $sql = "SELECT * FROM fms_g17_vehicle";
                                        $stmt = $this->conn()->query($sql);
                                        while ($row = $stmt->fetch()) { ?>
                                        <option value="<?php echo $row['vehicle_id'] ?>"><?php echo $row['name'] ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                </div>
                                <div style="text-align: right;">
                                    <button name="set" class='btn status' style="background-color: #1976D2;color: #fff;border: unset;padding: 10px 30px;font-size: 15px;"

                                      > Save</button>
                                </div>
                            </form>
                        </div>
                    </div>


                <?php }else if (isset($_GET['status'])) { ?>
                    <div class="orders">
                        <div class="header">
                            <h3>Update Status</h3>
                        </div>
                        <div class="header" style="display: block;width: 100%;">
                            <form method="POST" action="../controller/shipmentController.php" enctype="multipart/form-data">
                                <input type="hidden" name="reference_code" value="<?php echo $_GET['status'] ?>">
                                <div>
                                    Status
                                    <div class="input-field" style="max-width: unset;">
                                      <select class="form-control" name="status" required>
                                        <option value="">Select</option>
                                        <?php if ($_GET['oldstatus'] == '' OR $_GET['oldstatus'] == 0) { ?>
                                            <option value="1">Confirmed Order</option>
                                        <?php } else if ($_GET['oldstatus'] == 1) { ?>
                                            <option value="2">Processing Order</option>
                                        <?php } else if ($_GET['oldstatus'] == 2) { ?>
                                            <option value="3">Quality Check</option>
                                        <?php } else if ($_GET['oldstatus'] == 3) { ?>
                                            <option value="4">Dispatched Item</option>
                                        <?php } else if ($_GET['oldstatus'] == 4) { ?>
                                            <option value="5">Product Delivered</option>
                                        <?php } ?>
                                        
                                        
                                        
                                        
                                        
                                      </select>
                                    </div>
                                </div>
                                <div style="text-align: right;">
                                    <button name="setstatus" class='btn status' style="background-color: #1976D2;color: #fff;border: unset;padding: 10px 30px;font-size: 15px;"

                                      > Save</button>
                                </div>
                            </form>
                        </div>
                    </div>


                <?php } else { ?>


                    <div class="orders">
                        <div class="header">
                            <i class='bx bx-receipt'></i>
                            <h3>All Shipment Details</h3>
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
                                    <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Pending</small>
                                  <?php } else if ($row['status'] == 1) { ?> 
                                    <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Confirmed</small>
                                  <?php } else if ($row['status'] == 2) { ?> 
                                  <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Process</small>
                                  <?php } else if ($row['status'] == 3) { ?> 
                                  <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Quality Check</small>
                                  <?php } else if ($row['status'] == 4) { ?> 
                                  <small class="badge" style="background-color:#4caf50;padding: 4px;border-radius: 10px;font-size: 10px;font-weight: bold;color: #fff;">Dispatched</small>
                                  <?php } ?>
                         
                              </td>
                                <td>
                                  <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_details.php?reference_code=<?php echo $row['reference_code'] ?>"><i class="fa fa-eye"></i> View</a>

                                  <a href="shipment_details.php?location=<?php echo $row['reference_code'] ?>" class='btn button edit' style="background-color: #2e3833;color: #fff;"
                                  ><i class='fa fa-edit'></i> Location</a>

                                     <a href="shipment_details.php?status=<?php echo $row['reference_code'] ?>&oldstatus=<?php echo $row['status'] ?>" class='btn status' style="background-color: #2e3833;color: #fff;"
                                  > Status</a>

                                </td>
                              </tr>
        
                          <?php } ?>



                            </tbody>
                       </table>
                    </div>


                <?php } ?>

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