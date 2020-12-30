<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';
session_start();

if(isset($_POST["user_id"])){

    $clubNum = $_SESSION["club_number"];
    $memId = $_POST["user_id"];

    $sql = "DELETE FROM club_members
            WHERE id=? AND Club_id =?";
    
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo  "Error! Statement Failed.";
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ii' , $memId , $clubNum);
    
    if(mysqli_stmt_execute($stmt)){
        echo "Data Deleted";
    }
    else{
        echo "Error! Something Went Wrong";
    }

    mysqli_stmt_close($stmt);
    exit();

}


?>