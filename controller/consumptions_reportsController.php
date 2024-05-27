<?php
    
    include '../config/config.php';

    class controller extends Connection{

        public function managcontroller(){


            if (isset($_POST['add'])) {

                $title = $_POST['title'];
                $description = $_POST['description'];

                $sqlselect_users = "SELECT * FROM fms_g17_consumptions_reports WHERE title = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$title]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Consumptions Reports Already Exist');</script>";

                } else {

                    $sqlinsert = "INSERT INTO fms_g17_consumptions_reports (title, description) VALUES (?, ?)";
                    $connection = $this->conn(); 

                    $statementinsert = $connection->prepare($sqlinsert);
                    $statementinsert->execute([$title, $description]);

                    $lastInsertId = $connection->lastInsertId();




                    $sqlinsert = "INSERT INTO fms_g17_notification (all_id,description) VALUES (?,?)";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$lastInsertId,$title]);
               
                    echo "<script type='text/javascript'>alert('Successfully Add Consumptions Reports');</script>";
                    

                }

                echo "<script>window.location.href='../admin/consumptions_reports.php';</script>";

            }   

            if (isset($_POST['edit'])) {

                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];

                $sqlselect_users = "UPDATE fms_g17_consumptions_reports SET title = ?, description = ? WHERE id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$title,$description,$id]);

                $sqlselect_users = "UPDATE fms_g17_notification SET description = ? WHERE all_id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$title,$id]);

                echo "<script type='text/javascript'>alert('Successfully Update Consumptions Reports');</script>";
                echo "<script>window.location.href='../admin/consumptions_reports.php';</script>";

            }  

            if (isset($_POST['delete'])) {

                $id = $_POST['id'];

                $sqlselect_users = "DELETE FROM fms_g17_consumptions_reports WHERE id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$id]);

                echo "<script type='text/javascript'>alert('Successfully Delete Consumptions Reports');</script>";
                echo "<script>window.location.href='../admin/consumptions_reports.php';</script>";

            }     

        }

    }

    $controllerrun = new controller();
    $controllerrun->managcontroller();

?>
