
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

$ok =  $_POST["visitingClubName"];
// echo "$ok";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$Myarray = array();
$sql = "SELECT * FROM clubevents order by dated DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $Myarray[ ]= $row;
  }
} else {
  echo "0 results";
}


echo json_encode($Myarray);
// echo "$ok";
$conn->close();
?>