<?php

require './accessDatabase.php';
$ClubID=$_POST['clubID'];
$EventID=$_POST['eventID'];
// $ClubID=1;
// $EventID=122;
$MyArray = Array();
$MyArray = getEventData($ClubID,$EventID);
echo json_encode($MyArray);
// $conn->close();
?>
