<?php

require './accessDatabase.php';

$Myarray = array();
$sql = "SELECT EventName as 'Name',EventDescription as 'Description',Date FROM events ORDER BY Date DESC";
array_push($Myarray, inQuery($sql,$dbname = "nsu_clubs"));
echo json_encode($Myarray);
// $conn->close();
?>
