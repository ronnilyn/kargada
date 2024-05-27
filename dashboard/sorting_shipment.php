
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
                    <h1>Sorting Shipment</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Sorting Shipment</a></li>
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
                            <h3>All Sorting Shipment</h3>
                            <i class='bx bx-filter'></i>
                            <i class='bx bx-search'></i>
                        </div>
                        <table>
                            <thead>
                      <th>Location</th>
                      <th>Tools</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Warehouse A - 150 D. Aquino St, Grace Park West, Caloocan, 1406 Metro Manila</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse A - 150 D. Aquino St, Grace Park West, Caloocan, 1406 Metro Manila"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse B - BLK 15 LOT 1, BRIÑAS CORNER BANZON ST, BF Resort Dr, Las Piñas, 1747 Metro Manila</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse B - BLK 15 LOT 1, BRIÑAS CORNER BANZON ST, BF Resort Dr, Las Piñas, 1747 Metro Manila"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse X - Silangan Warehousing, Calamba, 4027 Laguna</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse X - Silangan Warehousing, Calamba, 4027 Laguna"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse Y - 5 Daisy Panacal Vill. P.C. 3500, Tuguegarao City, Cagayan</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse Y - 5 Daisy Panacal Vill. P.C. 3500, Tuguegarao City, Cagayan"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse M - 14 Lavilles Street, Mj Cuenco Avenue. P.C. 6000, Cebu City, Cebu.</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse M - 14 Lavilles Street, Mj Cuenco Avenue. P.C. 6000, Cebu City, Cebu."><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse N - 347115 Rizal St, Lapuz, Iloilo City, Iloilo</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse N - 347115 Rizal St, Lapuz, Iloilo City, Iloilo"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse P - Door No. 2, Luzviminda Building, Km. 9 Old Arpt Rd, Sasa, Davao City, 8000 Davao del Sur"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su</td>
                        <td>
                          <a class="btn button" style="background-color: #2e3833;color: #fff;" href="view_sorting_shipment.php?shipmentto=Warehouse Q - Kasanyangan Rd, Zamboanga, 7000 Zamboanga del Su"><i class="fa fa-eye"></i> View</a>
                        </td>
                    </tr>
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