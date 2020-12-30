<?php 

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "project01";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}




