<?php

require_once 'config.php';
require_once 'includes/db_inc.php';
require_once 'includes/functions_inc.php';

session_start();

if(isset($_SESSION["access_token"])){
     $gClient->setAccessToken($_SESSION["access_token"]);
}
else if(isset($_GET['code'])){
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION["access_token"] = $token;
}
else{
    header("location: login.php");
    exit();
}


$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo_v2_me->get();

$First_name = $userData['givenName'];
$Last_name = $userData['familyName'];
$Email = $userData['email'];
$_SESSION["userEmail"] = $userData['email'];

if(googleUserExists($conn,$Email) !== false){
    createGoogleUser($conn,$First_name,$Last_name,$Email);
    header("location: index.php");
    exit();
}
else{
    header("location: index.php");
    exit();
}

?>