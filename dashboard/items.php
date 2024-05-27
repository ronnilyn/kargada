
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
                    <h1>Items</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Items</a></li>
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
                        <h3>All Items</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                          <th>Items</th>
                          <th>Description</th>
                          <th>Length</th>
                          <th>Width</th>
                          <th>Height</th>
                        </thead>
                        <tbody>
                            <?php $sql = "SELECT * FROM fms_g17_items";
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

        </main>

    </div>

    <script src="index.js"></script>
</body>

</html>

<?php } }

  $controller = new controller();
  $controller->managecontroller();
            
?>