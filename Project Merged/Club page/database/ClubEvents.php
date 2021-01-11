<?php
require './accessDatabase.php';
$Myarray =  array();
$sql = "SELECT EventName as 'name', Date  FROM events WHERE  Date  >= \"" .date("Y-m-d"). "\" order by Date DESC";
// echo ($sql);

array_push($Myarray, inQuery($sql,$dbname = "nsu_clubs"));
// $data = [];
$sql = "SELECT EventName as 'name', Date  FROM events WHERE Date  < \"" .date("Y-m-d"). "\" order by Date DESC";

array_push($Myarray, inQuery($sql,$dbname = "nsu_clubs"));
// echo "</br>";
echo json_encode($Myarray);
// $conn->close();
 ?>