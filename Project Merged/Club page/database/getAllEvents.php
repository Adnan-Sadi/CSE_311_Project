<?php

require './accessDatabase.php';
// $clubID = $_GET['Id'];
$clubID = $_POST['clubID'];
if($_POST['functionName']=='eventDelete'){
        $eventID = $_POST['eventID'];
        // eventDelete($clubID,$eventID);
         eventDelete($clubID,$eventID);
}
else{
}
$Myarray = array();
$sql = "SELECT EventID as 'eID', EventName as 'Name',EventDescription as 'Description',Date ,(SELECT path 
                                                                                                FROM eventphotos
                                                                                                WHERE photoID = e.eventDP AND eventID = e.eventid) as DP
        FROM events as e
        WHERE ClubID = ".$clubID."
        ORDER BY Date DESC";
array_push($Myarray, inQuery($sql));
echo json_encode($Myarray);
// $clubID = 1;
// $conn->close();
?>
