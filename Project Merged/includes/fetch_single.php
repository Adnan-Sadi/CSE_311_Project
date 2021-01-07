<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';
session_start();

if(isset($_POST["user_id"])){
    
    $sql = "SELECT Name,NsuId,Dept_id,Email,PhoneNum,Position,Date_Joined
            FROM members 
            WHERE ClubId = ". $_SESSION["club_number"] ." AND NsuId = ". $_POST["user_id"] . " LIMIT 1;";

    $stmt = mysqli_query($conn,$sql);

    $output = mysqli_fetch_assoc($stmt);

    echo json_encode($output);

}


?>