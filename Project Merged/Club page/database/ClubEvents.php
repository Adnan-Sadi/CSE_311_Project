<?php
require './accessDatabase.php';
// $clubID = $_POST['clubID'];
$clubID = 1;
$Myarray =  array();
$sql = "SELECT EventName as 'name', Date , (SELECT path 
                                            FROM eventphotos
                                            WHERE photoID = eventDP AND eventID = events.eventid) as DP
         FROM events 
         WHERE  Date  >= \"" .date("Y-m-d"). "\" AND Clubid = ". $clubID ."
         ORDER BY Date DESC";
// echo $sql;
// echo ("</br>");
array_push($Myarray, inQuery($sql));
// $data = [];
$sql = "SELECT EventName as 'name', Date, (SELECT path 
                                            FROM eventphotos
                                            WHERE photoID = eventDP AND eventID = events.eventid) as DP
  FROM events
  WHERE Date  < \"" .date("Y-m-d"). "\" AND clubid = ". $clubID ." 
  ORDER BY Date DESC";
// echo $sql;
array_push($Myarray, inQuery($sql));
// echo "</br>";
echo json_encode($Myarray);
// $conn->close();
 ?>