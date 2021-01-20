<?php
    require "./accessDatabase.php";
    $sql = "SELECT EventName as 'name', Date , (SELECT path 
                                                 FROM eventphotos
                                                 WHERE photoID = eventDP AND eventID = events.eventid) as DP
            FROM events 
            WHERE  Date  >= \"" .date("Y-m-d"). "\" 
            ORDER BY Date DESC";
    // echo $sql;
    echo json_encode(inQuery($sql));
?>