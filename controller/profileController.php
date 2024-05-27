<?php
    
    include '../config/config.php';
    class users extends Connection{

        public function manageusers(){

            if (isset($_POST['saveadmin'])) {

                $user_id = $_POST['user_id'];
                $user_first_name = $_POST['name'];
                $user_email_address = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $img = $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], "../images/".$img);
                
                if ($img == '') {
                    $sqlinsert = "UPDATE fms_g17_users SET user_first_name = ?, user_email_address = ?,password = ?, passwordtxt = ? WHERE id = '".$user_id."'";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$user_first_name,$user_email_address,$password,$_POST['password']]);
                } else {

                    $sqlinsert = "UPDATE fms_g17_users SET img = ?, user_first_name = ?,user_email_address = ?,password = ?, passwordtxt = ? WHERE id = '".$user_id."'";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$img,$user_first_name,$user_email_address,$password,$_POST['password']]);
               
                    
                }

                if ($_SESSION['type'] == 0) {
                    echo "<script type='text/javascript'>alert('Successfully Edit Profile');</script>";
                    echo "<script>window.location.href='../admin/dashboard.php';</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Successfully Edit Profile');</script>";
                    echo "<script>window.location.href='../admin/evaluation.php';</script>";
                }

                    
                
            }

            if (isset($_POST['save'])) {

                $id = $_SESSION['id'];
                $user_first_name = $_POST['user_first_name'];
                $user_last_name = $_POST['user_last_name'];
                $user_contact = $_POST['user_contact'];
                $user_address = $_POST['user_address'];
                $user_email_address = $_POST['user_email_address'];
                $img = $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], "../images/".$img);
                
                if ($img == '') {
                    $sqlinsert = "UPDATE fms_g17_users SET user_first_name = ?, user_last_name = ?, user_contact = ?, user_address = ?, user_email_address = ?  WHERE id = '".$id."'";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$user_first_name,$user_last_name,$user_contact,$user_address,$user_email_address]);
                } else {

                    $sqlinsert = "UPDATE fms_g17_users SET img = ?, user_first_name = ?, user_last_name = ?, user_contact = ?, user_address = ?, user_email_address = ? WHERE id = '".$id."'";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$img,$user_first_name,$user_last_name,$user_contact,$user_address,$user_email_address]);
               
                    
                }

                echo "<script type='text/javascript'>alert('Successfully Edit Profile');</script>";
                echo "<script>window.location.href='../users/profile.php';</script>";   
            }

        }

    }

    $usersrun = new users();
    $usersrun->manageusers();

?>
