<?php
require "accessDatabase.php";
$ClubID = $_POST['clubID'];
$EventID = $_POST['eventID'];
if($_POST['functionName']=='deletePhoto'){
    $PhotoID = $_POST['PhotoID'];
    eventPhotoDelete($EventID,$PhotoID);
     echo 1;
}else if($_POST['functionName']=='deleteVideo'){
    $VideoID = $_POST['VideoID'];
    eventVideoDelete($EventID,$VideoID);
     echo 1;
}else{
    $MyArray = array();
    array_push($MyArray,getEventVideos($EventID));
    array_push($MyArray,getEventPhotos($EventID));
    echo json_encode($MyArray);
}
?>