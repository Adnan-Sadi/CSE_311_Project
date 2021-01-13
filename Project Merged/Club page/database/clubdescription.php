<?php
require "./accessDatabase.php";
// echo '<script>console.log("post missing")</script>';
$clubID = $_POST["id"];
// echo "<script>alert(". $clubID.")</script>";
// $clubID = 2;
$sql = "SELECT Club_Name,Description,Club_Fname,Club_Logo FROM clubs WHERE  clubId=".$clubID;
// echo $sql;
// $MyArray = array();
// echo json_encode($Myarray);
$MyArray = array();
array_push($MyArray,inQuery($sql));
$sql = "SELECT link
 FROM club_links
  WHERE club_links.id = ".$clubID;
array_push($MyArray,inQuery($sql));
echo json_encode($MyArray);
// $ClubArray = array();
// $ClubArray ["ShortName"] = "ACM";
// $ClubArray ["Discription"] = "The NSU ACM Student Chapter is a student community that drives networking and learning as a branch of ACM, the world’s largest educational and scientific computing society, at North South University. It is one of the 680+ student chapters of ACM established throughout the world. It was inaugurated in 2016 under the guidance of the Chairman of the ECE Department Dr. Shazzad Hossain.";
// $ClubArray ["ClubImg"] = "friends-week.jpg";
// $MyArray[] = $ClubArray;
// $LinkArray = array();
// $LinkArray["Facebook"] ="#";
// $LinkArray ["Twitter"] ="#";
// $LinkArray["WebLink"] ="#";
// $MyArray[] = $LinkArray;
// echo json_encode($MyArray);
?>