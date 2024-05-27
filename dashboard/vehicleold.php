
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
                    <h1>Vehicle</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Vehicle</a></li>
                    </ul>
                </div>
                <a href="vehicle.php?add=add" class="report btn">
                    <i class='bx bx-plus'></i>
                    <span>Vehicle</span>
                </a>
            </div>

            <div class="bottom-data">

                <?php if (isset($_GET['add']) OR isset($_GET['edit']) OR isset($_GET['delete'])) { 
                    if (isset($_GET['edit'])) {
                        $sql = "SELECT * FROM fms_g17_vehicle WHERE vehicle_id = '".$_GET['vehicle_id']."'";
                        $stmt = $this->conn()->query($sql);
                        $row2 = $stmt->fetch();
                    }
                    ?>
                    <div class="orders">
                        <div class="header">
                            <h3>Add Vehicle</h3>
                        </div>
                        <div class="header" style="display: block;width: 100%;">
                            <form class="form-horizontal" method="POST" action="../controller/vehicleController.php" enctype="multipart/form-data">
                                <?php  if (isset($_GET['edit']) OR isset($_GET['delete'])) { ?>
                                <input type="hidden" name="vehicle_id" value="<?php echo $_GET['vehicle_id'] ?>">
                                <?php } ?>
                                <?php  if (isset($_GET['delete'])) { ?>  
                                <br><br> 
                                <h3 style="text-align: center;">Are You Sure You want to Delete Data?</h3> 
                                <br><br>
                                <?php } ?>
                                <?php  if (!isset($_GET['delete'])) { ?>
                                    <div>
                                        Name
                                        <div class="input-field" style="max-width: unset;">
                                          <input name="name" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['name']; endif; ?>" class="form-control" />
                                        </div>
                                        Make
                                        <div class="input-field" style="max-width: unset;">
                                          <input name="make" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['make']; endif; ?>" class="form-control" />
                                        </div>
                                        Model
                                        <div class="input-field" style="max-width: unset;">
                                          <input name="model" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['model']; endif; ?>" class="form-control" />
                                        </div>
                                        Year
                                        <div class="input-field" style="max-width: unset;">
                                          <input type="number" name="year" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['year']; endif; ?>" class="form-control" />
                                        </div>
                                        Registration
                                        <div class="input-field" style="max-width: unset;">
                                          <input  name="registration" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['registration']; endif; ?>" class="form-control" />
                                        </div>
                                        Capacity
                                        <div class="input-field" style="max-width: unset;">
                                          <input type="number" name="capacity" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['capacity']; endif; ?>" class="form-control" />
                                        </div>
                                        Fuel Type
                                        <div class="input-field" style="max-width: unset;">
                                          <input name="fuel_type" value="<?php if(isset($_GET['vehicle_id'])): echo $row2['fuel_type']; endif; ?>" class="form-control" />
                                        </div>
                                    </div>
                                <?php } ?>
                                
                                <div style="text-align: right;">
                                    <button name="<?php if(isset($_GET['edit'])){ echo 'edit'; }else if(isset($_GET['delete'])){ echo 'delete'; }else{ echo 'add'; } ?>" class='btn status' style="background-color: #1976D2;color: #fff;border: unset;padding: 10px 30px;font-size: 15px;"

                                      > Save</button>
                                </div>
                            </form>
                        </div>
                    </div>

                <?php } else { ?>
                <div class="orders">
                    <div class="header">
                        <h3>Fleet</h3>
                    </div>
                    <table>
                        <thead>
                          <th>Name</th>
                          <th>Make</th>
                          <th>Model</th>
                          <th>Year</th>
                          <th>Registration</th>
                          <th>Capacity</th>
                          <th>Fuel Type</th>
                          <th>Tools</th>
                        </thead>
                        <tbody>
                            <?php 
                            //old $sql = "SELECT *,fms_g17_vehicle.vehicle_id AS fms_g17_vehicle_id FROM fms_g17_vehicle INNER JOIN fms_g17_users ON fms_g17_vehicle.driver_id=fms_g17_users.id";
                            $sql = "SELECT * FROM fms_g17_vehicle";
                            $stmt = $this->conn()->query($sql);
                            while ($row = $stmt->fetch()) { ?>
                               <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['make'] ?></td>
                                    <td><?php echo $row['model'] ?></td>
                                    <td><?php echo $row['year'] ?></td>
                                    <td><?php echo $row['registration'] ?></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['fuel_type'] ?></td>
                                    <td>
                                        <!--old <a class="btn button" href="vehicle.php?id=<?php echo $row['fms_g17_vehicle_id'] ?>&latitude=<?php echo $row['latitude'] ?>&longitude=<?php echo $row['longitude'] ?>"><i class="fa fa-eye"></i> View</a> -->


                                        <a class="btn button" href="vehicle.php?edit=edit&vehicle_id=<?php echo $row['vehicle_id'] ?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn button" href="vehicle.php?delete=delete&vehicle_id=<?php echo $row['vehicle_id'] ?>"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="orders">
                    <div class="header">
                        <h3>Vehicle Information</h3>
                        <?php if (isset($_GET['id'])) {
                        $sql = "SELECT * FROM fms_g17_vehicle INNER JOIN fms_g17_users ON fms_g17_vehicle.driver_id=fms_g17_users.id WHERE fms_g17_vehicle.id = '".$_GET['id']."'";
                        $stmt = $this->conn()->query($sql);
                        $row = $stmt->fetch(); } ?>
                    </div>
                    <div class="header" style="display: block;width: 100%;">
                        <div>
                            GPS URL:
                            <div class="input-field" style="max-width: unset;">
                              <input type="text" value="<?php if (isset($_GET['id'])) { ?>https://ctf.kargadafreightservices.com/controller/vehicleController.php?id=<?php echo $_GET['id'] ?>&latitude=value&longitude=value<?php } ?>" />
                            </div>
                        </div>

                        <div>
                            Other URL:
                            <div class="input-field" style="max-width: unset;">
                              <input type="text" value="<?php if (isset($_GET['id'])) { ?>https://ctf.kargadafreightservices.com/controller/vehicleController.php?vehicle_id=<?php echo $row['vehicle_id'] ?>&fuel_consumption=value&added_fuel=value&maintenance=value<?php } ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="bottom-data">
                        <div>
                            <p>Vehicle ID: <?php echo $row['vehicle_id']; ?></p>
                            <p>Driver Name: <?php echo $row['user_first_name'] ?> <?php echo $row['user_last_name'] ?></p>
                            <p>Destination: <?php echo $row['destination']; ?></p>
                        </div>

                        <div>
                            <p>Fuel Consumption: <?php echo $row['fuel_consumption']; ?></p>
                            <p>Added Fuel: <?php echo $row['added_fuel']; ?></p>
                            <p>Maintenance: <?php echo $row['maintenance']; ?></p>
                        </div>

                    </div>
                    <div class="">
                        <?php include '../map/index.php'; ?>
                    </div>
                </div>

                <?php } ?>

         

            </div>

        </main>

    </div>
</div>

    <script src="index.js"></script>
</body>

</html>

<?php } }

  $controller = new controller();
  $controller->managecontroller();
            
?>




