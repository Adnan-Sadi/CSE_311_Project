<?php

require_once 'db_inc.php';
session_start();

$userEmail = $_SESSION["userEmail"];
$clubId = $_POST["club_id"];

$sql = "SELECT UserId
        FROM all_users
        WHERE UserEmail = '$userEmail'";

$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($result);
$userId = $data["UserId"];

$sql = "INSERT INTO followclubs(UserId,ClubId) VALUES ($userId,$clubId);";
mysqli_query($conn,$sql);


?>