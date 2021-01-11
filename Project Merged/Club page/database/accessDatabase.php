<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nsu_clubs";

// Create connection


function inQuery($sql,$dbname = "mydb",$servername = "localhost",$username = "root",$password = "" ){
  // echo $dbname;
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  // echo "Success";
}
  $Myarray = array();
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $Myarray[ ]= $row;
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  return $Myarray;
}


// echo json_encode($Myarray);

?>