<?php 

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "nsu_clubs";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}




