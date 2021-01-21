<?php

require './accessDatabase.php';
$ClubID=$_POST['clubID'];
$EventID=$_POST['eventID'];
$userEmail = $_POST['userEmail'];
if(strlen($userEmail)>4){
    $UserID = getUserID($userEmail);
    if(isLeader($ClubID,$userEmail)){
        if($_POST['function']=='f'){
                eventEdit($ClubID,$EventID,$_POST['newEventName'],$_POST['newDescription']);
        }
    }
    if($_POST['function'] == 'followEvent'){
        goingToEvent($UserID,$EventID);
        // '<script> console.log("OK"); </script>';
    }
    else if($_POST['function']=='unFollowEvent'){
        NOTgoingToEvent($UserID,$EventID);
        // echo $userEmail;
    }
    else{
        $MyArray = Array();
    $MyArray = getEventData($ClubID,$EventID);
    $isFollowing['isFollowing'] = isFollower($UserID,$EventID);
    array_push($MyArray,$isFollowing);
    echo json_encode($MyArray);
    }
}else{
    $MyArray = Array();
    $MyArray = getEventData($ClubID,$EventID);
    echo json_encode($MyArray);
}
   

// $ClubID=1;
// $EventID=122;
// $conn->close();
?>
