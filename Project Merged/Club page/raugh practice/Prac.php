
<?php
require "../database/accessDatabase.php";
$eventID = 1;
$Path = "pafas";
$Title = "AMi";

if(insertUploadedImageData($eventID,$Path,$Title))
  echo "Success";
else 
  echo "NO WORKING";;

?>