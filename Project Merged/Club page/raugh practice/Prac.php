<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />

</head>

<body>
  <video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="640"
    height="264"
    poster="MY_VIDEO_POSTER.jpg"
    data-setup="{}"
  >
    <source src="../QUNNLm1wNA==.mp4" type="video/mp4" />
    <source src="MY_VIDEO.webm" type="video/webm" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

  <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>
</body>
</html>
<script>
  $("#OK").append('<a href=https://www.google.com> <div><div><h1>kolom</h1></div><img src="uploadsacm.png" alt=""></div></a>');
</script> -->

<!-- $follower = getAllFollowers(1);
$event = getEventForMail(1,186);
sendMailAboutEventCreation($follower[0]['Email'],$event[0]['ClubName'],$event[0]['EventName'],$follower[0]['Name'],$event[0]['Date'],$event[0]['EventDescription']);
function sendMailAboutEventCreation($to_email,$ClubName,$EventName,$FollowerName,$EventDate,$EventDescription){
  $to_email = "saeem03@gmail.com";
  $subject = "NEW EVENT COMING AHEAD";
  $ClubName = $ClubName ;
  $EventName = $EventName ;
  
  $body = 'Hi, '.$FollowerName.',<br>There will be an new event holding on <b>'.$EventDate. '</b> named <b>'. $EventName . '</b> by <b>'. $ClubName . '<b> <br> ' . $EventDescription;
  $body = '<html> <body>' . $body . '</body></htm>';
  // $headers = "From: NSU CLUB";
  $headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Additional headers
$headers[] = 'To: Saeem <Saeem03@gmail.com>';
$headers[] = 'From: From: NSU CLUB" <Amader@example.com>';
// $headers[] = 'Cc: birthdayarchive@example.com';
// $headers[] = 'Bcc: birthdaycheck@example.com';
  
  if (mail($to_email, $subject, $body, implode("\r\n", $headers))) {
      echo "Email successfully sent to $to_email...";
  } else {
      echo "Email sending failed...";
  }
}
// sendMailAboutEventCreation($to='Saeem03@gmail.com',$ClubName="ACM",$EventName="TECH",$FollowerName="Saeem",$EventDate="2020-1-12",$EventDescription="OK FINE"); -->

<?php 
require '../database/accessDatabase.php';
echo isLeader(5,'shanto@gmail.com');
?>