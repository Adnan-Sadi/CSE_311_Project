<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';
session_start();

if(isset($_POST["operation"])){

      $name       = $_POST["name"];
      $stdId      = $_POST["id"];
      $clubId     = $_SESSION["club_number"];
      $dept       = $_POST["dept_id"];
      $email      = $_POST["email"];
      $phone      = $_POST["phone"];
      $position   = $_POST["position"];
      $date_joined = $_POST["date_joined"];

    if(invalidStdid($stdId) !== false){
      echo "Please insert correct Student Id.";
      exit();
    }
    
    
      if(invalidEmail($email) !== false){
      echo "Please insert correct email.";
      exit();
    }

    if (invalidPhonenum($phone) !== false) {
      echo "Please insert correct Phone Number.";
      exit();
    }

    if($_POST["operation"] == "Add"){

       AddNewMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined);
    }

    if($_POST["operation"] == "Edit"){

        $mem_id = $_POST["user_id"];
        UpdateMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined,$mem_id);
    }
  }

  if(isset($_POST["operation2"])){


      $name       = $_POST["name2"];
      $stdId      = $_POST["id2"];
      $clubId     = $_SESSION["club_number"];
      $dept       = $_POST["dept_id2"];
      $email      = $_POST["email2"];
      $phone      = $_POST["phone2"];
      $position   = $_POST["position2"];
      $date_joined = $_POST["date_joined2"];

    if(invalidStdid($stdId) !== false){
      echo "Please insert correct Student Id.";
      exit();
    }
    
    if(invalidEmail($email) !== false){
      echo "Please insert correct email.";
      exit();
    }

    if (invalidPhonenum($phone) !== false) {
      echo "Please insert correct Phone Number.";
      exit();
    }


    if($_POST["operation2"] == "Add_exc"){
          
      $image = '';

          if($_FILES["mem_image"]["name"] != '')
          {
           $image = upload_mem_image();
          }
        
       AddNewMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined);
       AddNewExecMember($conn,$stdId,$clubId,$image);
    }

    if($_POST["operation2"] == "Edit"){

        $mem_id = $_POST["user_id2"];  
        $image = '';

          if($_FILES["mem_image"]["name"] != '')
          {
           $image = upload_mem_image();
          }
          else{
            $image = $_POST["hidden_user_image"];
          }

          UpdateMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$date_joined,$mem_id);
          UpdateExecMember($conn,$stdId,$clubId,$image);
       
    }

  }

?>