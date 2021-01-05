<?php
require './accessDatabase.php';
$Myarray = [];
$data = [];
$sql = "SELECT * FROM clubevents WHERE Dated  > \"" .date("Y-m-d"). "\" order by Dated DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($data,$row);
  }
} 
array_push($Myarray, $data);
$data = [];
$sql = "SELECT * FROM clubevents WHERE Dated < \"" .date("Y-d-m"). "\" order by Dated DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    array_push($data,$row);
  }
} 
$Myarray[1]= $data;
// echo "</br>";
echo json_encode($Myarray);
$conn->close();
 ?>