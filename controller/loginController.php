<?php
  
  include '../config/config.php';
  
  class login extends Connection{
  
    public function loginuser(){ 

      if (isset($_POST['signin'])) {

        $user_email_address = $_POST['user_email_address'];
        $password = $_POST['password'];

        $sqlselect_users = "SELECT * FROM fms_g17_users WHERE user_email_address = ?";
        $stmt = $this->conn()->prepare($sqlselect_users);
        $stmt->execute([$user_email_address]);

        if ($stmt->rowcount() > 0) {

          $row = $stmt->fetch();

          if (password_verify($password, $row['password'])) {

            $_SESSION['user_email_address'] = $row['user_email_address'];
            $_SESSION['user_first_name'] = $row['user_first_name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['type'] = $row['type'];

              if ($row['type'] == 1) {
                header('location:../dashboard/consumptions_reports.php');
                
              }else{
                header('location:../dashboard/dashboard.php');
              }


          } else {

            echo "<script type='text/javascript'>alert('Invalid Email And Password');</script>";
            echo "<script>window.location.href='../login/';</script>";

          }

        } else {

            echo "<script type='text/javascript'>alert('Invalid Email And Password');</script>";
            echo "<script>window.location.href='../login/';</script>";

        } 
       
      } 
         
    }

  }

  $loginrun = new login();
  $loginrun->loginuser();

?>



