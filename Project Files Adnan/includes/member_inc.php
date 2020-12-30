<?php

require_once 'db_inc.php';
require_once 'functions_inc.php';
session_start();

if(isset($_POST["operation"])){

      $name       = $_POST["name"];
      $stdId      = $_POST["id"];
      $clubId     = $_SESSION["club_number"];
      $dept       = $_POST["dept_name"];
      $email      = $_POST["email"];
      $phone      = $_POST["phone"];
      $position   = $_POST["position"];
      $sem_joined = $_POST["sem_joined"];

    if($_POST["operation"] == "Add"){

       AddNewMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$sem_joined);
    }

    if($_POST["operation"] == "Edit"){

        $mem_id = $_POST["user_id"];
        UpdateMember($conn,$name,$stdId,$clubId,$dept,$email,$phone,$position,$sem_joined,$mem_id);
    }
  

}

?>