<?php
$MyArray = array();
$ClubArray = array();
$ClubArray ["ShortName"] = "ACM";
$ClubArray ["Discription"] = "The NSU ACM Student Chapter is a student community that drives networking and learning as a branch of ACM, the world’s largest educational and scientific computing society, at North South University. It is one of the 680+ student chapters of ACM established throughout the world. It was inaugurated in 2016 under the guidance of the Chairman of the ECE Department Dr. Shazzad Hossain.";
$ClubArray ["ClubImg"] = "friends-week.jpg";
$MyArray[] = $ClubArray;
$LinkArray = array();
$LinkArray["Facebook"] ="#";
$LinkArray ["Twitter"] ="#";
$LinkArray["WebLink"] ="#";
$MyArray[] = $LinkArray;
echo json_encode($MyArray);
?>