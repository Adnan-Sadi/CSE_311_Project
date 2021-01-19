<?php
require '../database/accessDatabase.php';
print_r(getEventData(1,193));
?>
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
