<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';
session_start();

if(isset($_POST["operation"])){
    
    $userEmail = $_SESSION["userEmail"];

      $fname       = $_POST["fname"];
      $lname       = $_POST["lname"];
      $alt_email   = $_POST["alt_email"];
      
      
    $sql = "UPDATE users
            SET First_Name=?,Last_Name=?,Alt_Email=?
            WHERE Email = '$userEmail';";

    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt,$sql)) {
         echo  "Error! Statement Failed." . mysqli_error($conn);
         exit();
    }

    mysqli_stmt_bind_param($stmt, "sss" ,$fname,$lname,$alt_email);

    if(mysqli_stmt_execute($stmt)){
        echo "Profile Updated";
    }
    else{
        echo  "Error! Please insert appropiate values." . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);

  }

  if(isset($_POST["submit_image"])){

     $userEmail = $_SESSION["userEmail"];
     $path = $_FILES["change_image"]["name"];
     $extension = strtolower(pathinfo($path,PATHINFO_EXTENSION));
     $image = '';
     
     if($extension == 'gif' || $extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){      
         $image = upload_user_image();
     }
     else{
         header("location: ../profile.php?error=invlaidimage&extentsion=$extension");
         exit();
     }

     $sql = "UPDATE users
             SET Image = '$image'
             WHERE Email = '$userEmail';";

     mysqli_query($conn,$sql);
     
     header("location: ../profile.php");

  }
  
?>