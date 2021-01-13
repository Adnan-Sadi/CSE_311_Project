<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nsu_clubs";

// Create connection


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
  $Myarray = array();
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $Myarray[ ]= $row;
    }
  } else {
    // echo "0 results";
  }
  $conn->close();
  return $Myarray;
}
function SQL_Query($sql,$dbname = "nsu_clubs",$servername = "localhost",$username = "root",$password = "" ){
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
    // echo "Success";
  }
  $conn->query($sql);
  $conn->close();
}
function insertEvents($ClubId, $EventName , $EventDescription , $Dated ,$EventDP){
  $EventId="DEFAULT";
  if( $EventDP == ""){
      $EventDP = "DEFAULT";
    }
    $sql = "INSERT INTO events VALUES ("."$EventId".","."$ClubId".",". "'$EventName'"." ,". "'$EventDescription'"." , "."'$Dated'"." ,"."$EventDP"." )";
    // echo $sql;
    SQL_Query($sql);
}
function insertPhotos($EventId, $Path,$Title){
  $PhotoID="DEFAULT";
  $Uploaded_On = "DEFAULT";
    $sql = "INSERT INTO eventPhotos VALUES (".$PhotoID.","."$EventId".","."'$Path'".",". "$Uploaded_On"." ,". "'$Title'"." )";
    // echo $sql;
    SQL_Query($sql);
}
function getEventData($ClubID=1,$EventID=4){
  $sql = "SELECT EventDescription,Date,(SELECT path 
                                        FROM eventphotos 
                                        WHERE Eventid = e.eventID) AS photos,(SELECT path
                                                                              FROM eventvideos
                                                                              WHERE Eventid = e.Eventid) AS videos,( SELECT path
                                                                                                                      FROM eventPhotos
                                                                                                                      where photoid = e.eventDP) as DP
          From events AS e, clubs as c 
          WHERE e.ClubId = c.ClubId AND c.ClubId=". $ClubID ." AND e.eventID = ". $EventID .";";
  return inQuery($sql);

}
// echo json_encode($Myarray);

?>