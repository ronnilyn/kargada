<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">
        <?php if ($_SESSION['type'] == 0) { echo "Admin"; } else { echo "Driver"; } ?>
      </li>

      <?php if (isset($_SESSION['type']) AND $_SESSION['type'] == 0): ?>
      <li><a href="dashboard.php"><i class="fas fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="shipment_details.php"><i class="fas fa-list"></i> <span>Shipment</span></a></li>
      <li><a href="items.php"><i class="fas fa-shopping-bag"></i> <span>Items</span></a></li>
      <li><a href="notification.php" style="position: relative;"><i class="fas fa-bell"></i> <span>Notification</span> <span class="blink"></span></a></li>
      <li><a href="report.php"><i class="fas fa-list"></i> <span>Report</span></a></li>
      <?php endif; ?>


      <?php if (isset($_SESSION['type']) AND $_SESSION['type'] == 1): ?>
      <li><a href="consumptions_reports.php"><i class="fas fa-list"></i> <span>Consumptions Reports</span></a></li>
      <?php endif; ?>
    </ul>
  </section>
</aside>