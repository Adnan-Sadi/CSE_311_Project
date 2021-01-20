<?php

require './accessDatabase.php';
$ClubID=$_POST['clubID'];
$EventID=$_POST['eventID'];
if($_POST['function']=='f'){
    $MyArray = array();
    array_push($MyArray,$_POST['newEventName']);
    eventEdit($ClubID,$EventID,$_POST['newEventName'],$_POST['newDescriptuon']);
    
    echo $_POST['newEventNam1e'];
    // echo $_POST['newDescription'];
    // echo 'alert("$_POST["newEventName"]")';
    echo json_encode($MyArray);
}
else{
    $MyArray = Array();
    $MyArray = getEventData($ClubID,$EventID);
    echo json_encode($MyArray);
}
// $ClubID=1;
// $EventID=122;
// $conn->close();
?>
