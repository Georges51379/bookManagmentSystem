<?php
require_once("../db/connection.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];

		$result =mysqli_query($con,"SELECT email FROM  authors WHERE email='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#btn').prop('disabled',true);</script>";
} else{

	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#btn').prop('disabled',false);</script>";
}
}
?>
