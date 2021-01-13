<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nsu_clubs";

// Create connection

// echo "<script>console.log("ok")</script>";
// echo "OK";
function SQL_Query($sql,$dbname = "nsu_clubs",$servername = "localhost",$username = "root",$password = "" ){
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
    echo "Successfully connected";
  }
  if($conn->query($sql)){
    echo "SUCCESS";
  }
  else{
    echo "NOT DONE";
  }
  $conn->close();
}
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
//   echo "SSS";
// }
// else{
//   echo "Success";
// }
function insertEvents($ClubId, $EventName , $EventDescription , $Dated ,$EventDP){
  $EventId="DEFAULT";
  if( $EventDP == ""){
      $EventDP = "DEFAULT";
    }
    $sql = "INSERT INTO events VALUES ("."$EventId".","."$ClubId".",". "'$EventName'"." ,". "'$EventDescription'"." , "."'$Dated'"." ,"."$EventDP"." )";
    echo $sql;
    SQL_Query($sql);
}
function insertPhotos($EventId, $Path,$Title){
  $PhotoID="DEFAULT";
  $Uploaded_On = "DEFAULT";
    $sql = "INSERT INTO eventPhotos VALUES (".$PhotoID.","."$EventId".","."'$Path'".",". "$Uploaded_On"." ,". "'$Title'"." )";
    echo $sql;
    SQL_Query($sql);
}

function inQuery($sql,$dbname = "nsu_clubs",$servername = "localhost",$username = "root",$password = "" ){
  // echo $dbname;
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
  // echo "Success";
}
echo $sql."</br>";
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
$EventID = 1;
$sql = "SELECT PhotoId FROM eventPhotos where eventID =". $EventID ." ORDER BY PhotoId  DESC LIMIT 1";
$Myarray = inQuery($sql);
//  $EventID = $Myarray[0]['EventID'];
$EventDP = $Myarray[0]['PhotoId'];
$sql = "UPDATE events
               SET eventdp = ". "$EventDP" ." 
               WHERE EventID = (SELECT EventID
               FROM eventphotos
               ORDER BY Uploaded_On DESC
               LIMIT 1 )";
               echo $sql."</br>";
SQL_Query($sql);

?>