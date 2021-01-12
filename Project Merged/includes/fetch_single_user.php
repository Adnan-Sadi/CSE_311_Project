<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';


if(isset($_POST["user_id"])){
    
    $userId=$_POST["user_id"];

    $sql = "SELECT First_Name,Last_Name,Alt_Email
            FROM users WHERE uid = $userId ;";

    $stmt = mysqli_query($conn,$sql);

    $output = mysqli_fetch_assoc($stmt);

    echo json_encode($output);

}

?>