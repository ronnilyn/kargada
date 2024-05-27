<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maplatlng";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


   $latitude = $_POST['latitude'];
   $longitude = $_POST['longitude'];
   $description = $_POST['description'];

$sql = "SELECT * FROM location WHERE description = '$description'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {


} else {
	$sql = "INSERT INTO location (latitude,longitude,description) VALUES ('$latitude','$longitude','$description')";
$result = mysqli_query($conn, $sql);

}


mysqli_close($conn);
?>
