<?php
    
    include '../config/config.php';

    class controller extends Connection{

        public function managcontroller(){

            if (isset($_POST['add'])) {

                $name = $_POST['name'];
                $make = $_POST['make'];
                $model = $_POST['model'];
                $year = $_POST['year'];
                $registration = $_POST['registration'];
                $capacity = $_POST['capacity'];
                $fuel_type = $_POST['fuel_type'];

                $sqlselect_users = "SELECT * FROM fms_g17_vehicle WHERE name = ? AND make = ? AND model = ? AND registration = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$name,$make,$model,$year]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Vehicle Already Exist');</script>";

                } else {

                    $sqlinsert = "INSERT INTO fms_g17_vehicle (name, make, model, year, registration, capacity, fuel_type) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $connection = $this->conn(); 

                    $statementinsert = $connection->prepare($sqlinsert);
                    $statementinsert->execute([$name,$make,$model,$year,$registration,$capacity,$fuel_type]);

                    $lastInsertId = $connection->lastInsertId();
               
                    echo "<script type='text/javascript'>alert('Successfully Add Vehicle');</script>";
                    
                }

                echo "<script>window.location.href='../dashboard/vehicle.php';</script>";

            }   

            if (isset($_POST['edit'])) {

                $vehicle_id = $_POST['vehicle_id'];
                $name = $_POST['name'];
                $make = $_POST['make'];
                $model = $_POST['model'];
                $year = $_POST['year'];
                $registration = $_POST['registration'];
                $capacity = $_POST['capacity'];
                $fuel_type = $_POST['fuel_type'];

                $sqlselect_users = "UPDATE fms_g17_vehicle SET name = ?, make = ?, model = ?, year = ?, registration = ?, capacity = ?, fuel_type = ? WHERE vehicle_id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                    $stmt->execute([$name,$make,$model,$year,$registration,$capacity,$fuel_type,$vehicle_id]);


                echo "<script type='text/javascript'>alert('Successfully Update Vehicle');</script>";
                echo "<script>window.location.href='../dashboard/vehicle.php';</script>";

            }  

            if (isset($_POST['delete'])) {

                $vehicle_id = $_POST['vehicle_id'];

                $sqlselect_users = "DELETE FROM fms_g17_vehicle WHERE vehicle_id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$vehicle_id]);

                echo "<script type='text/javascript'>alert('Successfully Delete Vehicle');</script>";
                echo "<script>window.location.href='../dashboard/vehicle.php';</script>";

            }  

            if (isset($_POST['availability'])) {

                $vehicle_id = $_POST['vehicle_id'];
                $start_date = $_POST['start_date'];
                $end_date = $_POST['end_date'];
                $is_available = $_POST['is_available'];

                $sqlinsert = "INSERT INTO fms_g17_vehicle_availability (vehicle_id, start_date, end_date, is_available) VALUES (?, ?, ?, ?)";
                    $connection = $this->conn(); 

                    $statementinsert = $connection->prepare($sqlinsert);
                    $statementinsert->execute([$vehicle_id,$start_date,$end_date,$is_available]);


                echo "<script type='text/javascript'>alert('Successfully Update Availability');</script>";
                echo "<script>window.location.href='../dashboard/vehicle.php';</script>";

            } 

            if (isset($_GET['vehicle_id'])) {

                $vehicle_id = $_GET['vehicle_id'];
                $added_fuel = $_GET['added_fuel'];
                $fuel_consumption = $_GET['fuel_consumption'];
                $maintenance = $_GET['maintenance'];

                $sqlselect_users = "UPDATE fms_g17_vehicle SET added_fuel = ?, fuel_consumption = ?, maintenance = ? WHERE vehicle_id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
               $stmt->execute([$added_fuel,$fuel_consumption,$maintenance,$vehicle_id]);

            }  

            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $latitude = $_GET['latitude'];
                $longitude = $_GET['longitude'];

                $sqlselect_users = "UPDATE fms_g17_vehicle SET latitude = ?, longitude = ? WHERE id = ?";
                $stmt = $this->conn()->prepare($sqlselect_users);
               $stmt->execute([$latitude,$longitude,$id]);

            }     

        }

    }

    $controllerrun = new controller();
    $controllerrun->managcontroller();

?>
