<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
  $password = $_POST['password'];
	$birthDate=$_POST['birthDate'];
	$authorBio=$_POST['authorBio'];
  $status=$_POST['status'];
  $authorStatus=$_POST['authorStatus'];

  $hashedpwd = password_hash($password, PASSWORD_BCRYPT);
  $code = rand(999999, 111111);

//insert variable to DB
$sql=mysqli_query($con,"INSERT INTO authors (name,email,password,birthDate,authorBio,code, status,authorStatus)
                  VALUES('$name','$email','$hashedpwd','$birthDate','$authorBio', '$code','$status','$authorStatus')");
$_SESSION['msg']="Author Created Successfully !!";
}
?>
<html lang="en">
<head>
	<title>Admin | Insert Author</title>
	<link type="text/css" href="img/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
<!--FONT AWESOME CDN SECTION-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--jQUERY CDN SECTION-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<link href="css/admin.css" rel="stylesheet">
</head>

<body>
	<?php include('includes/topnavigation.php');?>

	<center>
		<div class="container">
	<div class="titlewrapper">
		<h3 class="title">insert Author</h3>
	</div>

	<!--**********************START ADD DELETE CATEGORY MSG********************************************************************-->

	<div class="wrapper">
										<?php if(isset($_POST['submit']))
	{?>
										<div class="msgwrapper">
										<strong  class="positivemsg">Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
										</div>
	<?php } ?>
	<div class="wrapper">
	<?php if(isset($_GET['del']))
	{?>
			<div class="msgwrapper">
			<strong class="negativemsg">Oh Noo!</strong><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
			</div>
	<?php } ?>
			<br />
	<!--***********************************END ADD DELETE CATEGORY MSG*******************************************************-->


			<form class="admin_form" name="insertbook" method="post" enctype="multipart/form-data">


				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">name</label><br>
        <input type="text"    name="name"  placeholder="Enter name" class="adminform_input" required>
				</div>

				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">email</label><br>
        <input type="email"    name="email"  placeholder="Enter email" class="adminform_input" required>
				</div>

        <div class="adminform_div">
					<label class="adminform_label" for="basicinput">password</label><br>
          <input type="password"    name="password"  placeholder="Enter password " class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">birth date</label><br>
					<input type="date"    name="birthDate"  placeholder="Enter birth date " class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">author bio</label><br>
					<textarea type="text"    name="authorBio"  placeholder="Enter author Bio" class="adminform_input" required>
          </textarea>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">status</label><br>
					<input type="text" name="status"  placeholder="Enter status" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">author status</label><br>
					<input type="text" name="authorStatus" id="authorStatus" palceholder="Enter author Status" class="adminform_input" required>
				</div>
				<div class="adminform_div">
					<button type="submit" name="submit" class="adminform_btn">Insert</button>
				</div>
			</form>
		</div>
	</div>
</div>
</center>
	<?php include('includes/footer.inc.php');?>
	<?php include 'includes/arrow_to_top.inc.php'; ?>

	<!--DATATABLES SECTION JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<!--END DATATABLES SECTION JS-->

	<script>
		$(document).ready(function() {
	    $('#datable').DataTable( {
	        "columnDefs": [
	            {
	              "render": function ( data, type, row ) {
	              	return data +' ('+ row[3]+')';
				      },
				            "targets": 0
				         },
				          	{ "visible": false,  "targets": [ 3 ] }
				        ]
	    });
			});
		</script>

</body>
<?php } ?>
