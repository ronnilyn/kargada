<?php
    
    include '../config/config.php';

    class controller extends Connection{

        public function managcontroller(){

            if (isset($_POST['set'])) {

                $reference_code = $_POST['reference_code'];
                $shipmentfrom = $_POST['shipmentfrom'];
                $shipmentto = $_POST['shipmentto'];
                $vehicle_id = $_POST['vehicle_id'];

                $sqlselect_users = "SELECT * FROM fms_g17_shipment WHERE reference_code = ? AND shipmentfrom = ? AND shipmentto = ? AND vehicle_id = ? ";
                $stmt = $this->conn()->prepare($sqlselect_users);
                $stmt->execute([$reference_code,$shipmentfrom,$shipmentto,$vehicle_id]);

                if ($stmt->rowcount() > 0) {

                    echo "<script type='text/javascript'>alert('Shipment Location Already Exist');</script>";

                } else {

                    $sqlinsert = "INSERT INTO fms_g17_shipment (reference_code,shipmentfrom,shipmentto,vehicle_id) VALUES (?,?,?,?)";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$reference_code,$shipmentfrom,$shipmentto,$vehicle_id]);

                    $sqlinsert = "UPDATE fms_g17_shipment_details SET shipmentfrom = ?, shipmentto = ?, vehicle_id = ? WHERE reference_code = '".$reference_code."'";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$shipmentfrom,$shipmentto,$vehicle_id]);
               
                    echo "<script type='text/javascript'>alert('Successfully Set Location');</script>";

                }
            }

            if (isset($_POST['setstatus'])) {

                $reference_code = $_POST['reference_code'];
                $status = $_POST['status'];

                if ($status == "") {

                } else {

                    $sqlinsert = "INSERT INTO fms_g17_status (reference_code,status) VALUES (?,?)";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$reference_code,$status]);

                    $sqlinsert = "UPDATE fms_g17_shipment_details SET status = ? WHERE reference_code = '".$reference_code."'";
                    $statementinsert = $this->conn()->prepare($sqlinsert);
                    $statementinsert->execute([$status]);
               
                    echo "<script type='text/javascript'>alert('Successfully Change Status');</script>";

                }

            }

            

            

            echo "<script>window.location.href='../dashboard/shipment_details.php';</script>";

                

        }

    }

    $controllerrun = new controller();
    $controllerrun->managcontroller();

?>
