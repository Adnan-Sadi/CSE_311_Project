<?php

require './accessDatabase.php';
// $clubID = $_GET['Id'];
$clubID = $_POST['clubID'];
// $clubID = 1;
$Myarray = array();
$sql = "SELECT EventID as 'eID', EventName as 'Name',EventDescription as 'Description',Date ,(SELECT path 
                                                                                                FROM eventphotos
                                                                                                WHERE photoID = eventDP AND eventID = events.eventid) as DP
        FROM events
        WHERE ClubID = ".$clubID."
        ORDER BY Date DESC";
array_push($Myarray, inQuery($sql));
echo json_encode($Myarray);
// $conn->close();
?>
