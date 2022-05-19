<?php
require_once("../db/connection.php");
if(!empty($_POST["name"])) {
	$name= $_POST["name"];

		$result =mysqli_query($con,"SELECT name FROM  users WHERE  name='$name'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Username already exists .</span>";
 echo "<script>$('#btn').prop('disabled',true);</script>";
} else{

	echo "<span style='color:green'> Username available for Registration .</span>";
 echo "<script>$('#btn').prop('disabled',false);</script>";
}
}


?>
