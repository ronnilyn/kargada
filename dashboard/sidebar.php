<div class="sidebar">
        <a href="#" class="logo">
            <img src="./images/kargada-logo.png" alt="">
            <div class="logo-name"><span>Kar</span>gada</div>
        </a>
        <ul class="side-menu">
            <?php if (isset($_SESSION['type']) AND $_SESSION['type'] == 0): ?>
            <li><a href="dashboard.php"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="shipment_details.php"><i class='bx bx-analyse'></i>Shipment</a></li>
            <li><a href="items.php"><i class='bx bx-store-alt'></i>Items</a></li>
            <li><a href="vehicle.php"><i class='bx bxs-truck'></i>Vehicle</a></li>
            <li><a href="report.php"><i class='bx bx-group'></i>Report</a></li>
            <li><a href="sorting_shipment.php"><i class='bx bxs-pin'></i>Sorting Shipment</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['type']) AND $_SESSION['type'] == 1): ?>
                <li><a href="consumptions_reports.php"><i class="bx bx-group"></i> <span>Consumptions Reports</span></a></li>
            <?php endif; ?>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../logout.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>