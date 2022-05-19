<?php
session_start();
include("db/connection.php");
$_SESSION['email']=="";
session_unset();
session_destroy();
header('location: index.php');
?>
