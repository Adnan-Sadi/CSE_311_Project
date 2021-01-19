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
  // $sql = mysqli_real_escape_string($conn,$sql);
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      array_push($Myarray,$row);
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
  $x = true;
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    // echo "Success";
    // $sql = mysqli_real_escape_string($conn, $sql);
    if ($conn->query($sql)) {
      $x = true;
    } else {
      $x = false;
    }
  }
  
  $conn->close();
  return $x;
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

//sql photo table input
function insertPhotos($EventId, $Path,$Title){
  $PhotoID="DEFAULT";
  $Uploaded_On = "DEFAULT";
    $sql = "INSERT INTO eventPhotos VALUES (".$PhotoID.","."$EventId".","."'$Path'".",". "$Uploaded_On"." ,". "'$Title'"." )";
    // echo $sql;
    SQL_Query($sql);
}
function insertUploadedImageData($EventID,$Path,$Title){
  $sql = 'INSERT INTO eventPhotos VALUES (DEFAULT,'. $EventID .', '. "'$Path'" .', DEFAULT,'. "'$Title'" .')';
  // echo $sql;
  return(SQL_Query($sql));

}
function insertUploadedVideoData($EventID,$Path,$Title){
  $sql = 'INSERT INTO eventVideos VALUES (DEFAULT,'. $EventID .', '. "'$Path'" .', DEFAULT,'. "'$Title'" .')';
  // echo $sql;
  return(SQL_Query($sql));

}
function getEventForMail($ClubID,$EventID){
  $sql = 'SELECT EventName , EventDescription ,
                 Club_Fname as Fullname, Date ,
                 (Select club_Name 
                 FROM clubs  where clubId = '. "$ClubID" .' ) AS ClubName'.'
          From events 
          WHERE eventId = '."$EventID";
  return inQuery($sql);
};

function getEventData($ClubID,$EventID){
  $Myarray = Array();
  $sql = 'SELECT EventName , EventDescription , Date , (SELECT path
                                                        FROM eventPhotos
                                                        WHERE PhotoId  = (SELECT eventDP FROM Events WHERE clubId = '. "$ClubID" .' )) AS DP,
                                                        (Select club_Name 
                                                        FROM clubs
                                                        where clubId = '. "$ClubID" .' ) AS ClubName'.'
          From events
          WHERE eventId = '."$EventID";

  array_push($Myarray,inQuery($sql));
  $sql = 'SELECT ep.path as photo,ep.uploaded_on as Uploaded_On,ep.title as Title 
          FROM eventphotos AS ep,events as e
          WHERE ep.EventID=e.eventId AND  ep.eventID = '.$EventID;
  array_push($Myarray,inQuery($sql));
  $sql = 'SELECT ev.path as video,ev.uploaded_on as Uploaded_On,ev.title as Title 
  FROM eventVideos AS ev,events as e
  WHERE ev.EventID=e.eventId AND  ev.eventID = '.$EventID;
  array_push($Myarray,inQuery($sql));
  // echo json_encode($Myarray);
  return ($Myarray);

}
function uploadImage($file, $folderPath)
    {
        $errors = array();
        $file_name = $_FILES[$file]['name'];
        $file_size = $_FILES[$file]['size'];
        $file_tmp = $_FILES[$file]['tmp_name'];
        $file_type = $_FILES[$file]['type'];
        $arrayVar = explode('.', $_FILES[$file]['name']);
        $extension = end($arrayVar);
        $file_ext = strtolower($extension);
        $file_name = base64_encode($_FILES[$file]['name']).'.jpg';
        $extensions = array("jpeg", "jpg", "png");
        //file upload path
        $fileDestination = $folderPath . $file_name;
        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $fileDestination);
        } else {
            print_r($errors);
        }
        return $file_name;
    }

    function uploadVideo($file,$fileDestination){
        $errors = array();
        $file_name = $_FILES[$file]['name'];
        if(empty($file_name)){return $file_name;}
          echo "FILENAME" . $file_name;
          echo "<script>console.log('working')</script>";
          $file_size = $_FILES[$file]['size'];
          $file_tmp = $_FILES[$file]['tmp_name'];
          $file_type = $_FILES[$file]['type'];
          $arrayVar = explode('.', $_FILES[$file]['name']);
          $extension = end($arrayVar);
          $file_ext = strtolower($extension);
          $file_name = base64_encode($_FILES[$file]['name']) . ".mp4";
          $extensions = array("mp4", "webm");
          //file upload path
          $fileDestination = $fileDestination . $file_name;
          // if (in_array($file_ext, $extensions) === false) {
          //     $errors[] = "extension not allowed, please choose a MP4  file.";
          // }

          if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $fileDestination);
          } else {
            print_r($errors);
          }
          return $file_name;
        }

function get_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function eventDelete($ClubID,$EventID){
          $sql = 'Delete FROM events
                  WHERE ClubId = '."$ClubID".' AND EventId = '."$EventID";
            SQL_Query($sql);

    }
    function eventEdit($ClubID=null,$EventID=null,$Title=null,$Description=null){
      $items='';
      if(!empty($Description)){
        $items.= ' EventDescription = '. "'$Description'";
      }
       if(!empty($Title)){
         if(!empty($Description)){
           $items .= ' , ';
         }
        $items .= ' EventName = '. "'$Title'";
      }
      $sql = 'UPDATE  events
              SET  '."$items" .'
      WHERE ClubId = '."$ClubID".' AND EventId = '."$EventID";
      echo $sql;
      return SQL_Query($sql);
    }
    function getAllFollowers($ClubID){
    $sql = "SELECT CONCAT(First_Name,' ',Last_Name) AS Name , Email
      FROM users,(Select userID
                  FROM followclubs
                  WHERE ClubId = " . "$ClubID" . " ) AS follower
      where uid = userID";
      return inQuery($sql);
  }

  function sendMailAboutEventCreation($to_email,$ClubName,$EventName,$EventFullname,$FollowerName,$EventDate,$EventDescription){
  // $to_email = "saeem03@gmail.com";
  $subject = "NEW EVENT COMING AHEAD";
  $ClubName = $ClubName;
  $EventName = $EventName;

  $body = 'Hi, ' . $FollowerName . ',<br>There will be an new event holding on <b>' . $EventDate . '</b> named <b>' . $EventName . '</b> by <b>' . $ClubName . '<b><br> ' . $EventDescription . '<br> ';
  $body = '<html> <body>' . $body . '</body></htm>';
  $headers[] = 'MIME-Version: 1.0';
  $headers[] = 'Content-type: text/html; charset=iso-8859-1';

  // Additional headers
  $headers[] = 'To: Saeem <Saeem03@gmail.com>';
  $headers[] = 'From: NSU CLUB ';
  // $headers[] = 'Cc: birthdayarchive@example.com';
  // $headers[] = 'Bcc: birthdaycheck@example.com';

  return mail($to_email, $subject, $body, implode("\r\n", $headers));
}
function isLeader($ClubID,$email){
  $sql = 'select m_id
          from members
          where Email = ' ."'$email'" . ' AND position like "%president" AND ClubId='.$ClubID; 
  // echo $sql;
  if(count(inQuery($sql))>0){
    return 1;
  }
  else return 0;
}
