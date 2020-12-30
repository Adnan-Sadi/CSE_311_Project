<?php

require_once 'GoogleAPI/vendor/autoload.php';

$gClient = new Google_Client();
$gClient->setClientId("886397366311-4oinbv4o5dubfolchn89r2apo771l3n7.apps.googleusercontent.com");
$gClient->setClientSecret("dSC-AnO-AY3wR17DS2chwndq");
$gClient->setApplicationName("NSU Clubs");
$gClient->setRedirectUri("http://localhost/Practice/PHP%20Login/g-callback.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>