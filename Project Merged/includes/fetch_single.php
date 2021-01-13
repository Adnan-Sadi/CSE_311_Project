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

if(isset($_POST["user_id2"])){
    
    $sql = "SELECT Name,NsuId,Dept_id,Email,PhoneNum,Position,Date_Joined,Photo
            FROM members Natural JOIN executive_members
            WHERE ClubId = ". $_SESSION["club_number"] ." AND NsuId = ". $_POST["user_id2"] . " LIMIT 1;";

    $stmt = mysqli_query($conn,$sql);

    $output = mysqli_fetch_assoc($stmt);

    if($output["Photo"] != ''){
      $output['mem_image'] = '<br><img src="./images/Executive_Members/'.$output["Photo"].'" class="img-thumbnail" width="50" height="35" >
                              <input type="hidden" name="hidden_user_image" value="'.$output["Photo"].'" >';
    }
    else{
     $output['mem_image'] = '<input type="hidden" name="hidden_user_image" value="" >';
    }

    echo json_encode($output);

}




?>