<?php 

require_once '../config.php';

$gClient-> revokeToken();

session_start();
session_unset();
session_destroy();

header("location: ../index.php");
exit();