<?php
require_once("../db/connection.php");
if(!empty($_POST["password"])) {
	$password= $_POST["password"];

  if(strlen($password) < 10){
    echo "<span style='color:red'> Password should be at least 10 characters .</span>";
     echo "<script>$('#btn').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> Password available for Registration .</span>";
  echo "<script>$('#btn').prop('disabled',false);</script>";
}
}
?>
