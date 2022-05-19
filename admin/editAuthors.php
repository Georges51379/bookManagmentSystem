<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
  date_default_timezone_set('Asia/Beirut');// change according timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () );

	$id = $_GET['id'] ;// Authors ID

if(isset($_POST['submit']))//ss
{
  $name =$_POST['name'];
  $email =$_POST['email'];
  $birthDate =$_POST['birthDate'];
  $authorBio =$_POST['authorBio'];
  $authorStatus =$_POST['authorStatus'];
  $status =$_POST['status'];

$sql=mysqli_query($con,"UPDATE  authors SET name='$name',email='$email',birthDate='$birthDate',authorBio='$authorBio',authorStatus='$authorStatus', status='$status',
   updateDate='$currentTime' WHERE id='$id' ");
$_SESSION['msg']="Author has been Updated Successfully !!";
}
?>

<html lang="en">
<head>
	<title>Admin | Edit Authors</title>
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
		<h3 class="title">edit authors</h3>
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

			<form class="admin_form" name="insertAuthor" method="post" enctype="multipart/form-data">

<?php
$query=mysqli_query($con,"SELECT * FROM authors WHERE id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">name</label><br>
										<input type="text"  name="name"  placeholder="Enter author Name" value="<?php echo htmlentities($row['name']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">email</label><br>
										<input type="text"    name="email"  placeholder="Enter email"	value="<?php echo htmlentities($row['email']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">birth Date</label><br>
										<input type="date" name="birthDate"  placeholder="Enter birth Date"	 value="<?php echo htmlentities($row['birthDate']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">author bio</label><br>
                    <input type="text" name="authorBio"  placeholder="Enter author Bio" value="<?php echo htmlentities($row['authorBio']);?>" class="adminform_input" required>
									</div>

                  <div class="adminform_div">
                    <label class="adminform_label" for="basicinput">status</label><br>
                    <input type="text" name="status"  placeholder="Enter status" value="<?php echo htmlentities($row['status']);?>" class="adminform_input" >
                  </div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">author Status</label><br>
										<input type="text" name="authorStatus"  placeholder="Enter author status" value="<?php echo htmlentities($row['authorStatus']);?>" class="adminform_input" >
									</div>


										<?php } ?>
											<div class="adminform_div">
												<button type="submit" name="submit" class="adminform_btn">Update</button>
											</div>
									</form>
							</div>
						</div>
</center>
</div>
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
