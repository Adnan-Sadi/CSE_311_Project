<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';
session_start();

if(isset($_POST["user_id"])){
    
    $sql = "SELECT Name,Id,Dept_name,Email,PhoneNum,Position,Semester_joined
            FROM club_members 
            WHERE Club_id = ". $_SESSION["club_number"] ." AND Id = ". $_POST["user_id"] . " LIMIT 1;";

    $stmt = mysqli_query($conn,$sql);

    $output = mysqli_fetch_assoc($stmt);

    echo json_encode($output);

}


?>