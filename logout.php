<?php
session_start();
include("db/connection.php");
$_SESSION['email']=="";
date_default_timezone_set('Asia/Beirut');
session_unset();
session_destroy();
header('location: index.php');
?>
