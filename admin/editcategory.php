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


if(isset($_POST['submit']))
{
	$categoryName=$_POST['categoryName'];
	$categoryDescription=$_POST['categoryDescription'];
	$categoryStatus=$_POST['categoryStatus'];

	$catName=$_GET['catName'];

$sql=mysqli_query($con,"UPDATE category SET categoryName='$categoryName',categoryDescription='$categoryDescription', categoryStatus='$categoryStatus',
                  updateDate='$currentTime' WHERE categoryToken = '".$_GET['catName']."'");
$_SESSION['msg']="Category Updated !!";
header("location: category.php");
}

?>
<html lang="en">
<head>
	<title>Admin | Edit Category</title>
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
		<h3 class="title">Category</h3>
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

			<form class="admin_form" name="Category" method="post" >
<?php
$query=mysqli_query($con,"SELECT * FROM category WHERE categoryToken = '".$_GET['catName']."'");
while($row=mysqli_fetch_array($query))
{
?>
										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">Category Name</label>
											<input type="text" placeholder="Enter Category Name" name="categoryName" value="<?php echo  htmlentities($row['categoryName']);?>" class="adminform_input" required>
										</div>
										<div class="adminform_div">
												<label class="adminform_label" for="basicinput">Description</label>
												<textarea class="adminform_textarea" name="categoryDescription" rows="5"><?php echo  htmlentities($row['categoryDescription']);?></textarea>
										</div>
										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">Category Status</label>
											<input type="text" placeholder="Enter Category Status" name="categoryStatus" value="<?php echo  htmlentities($row['categoryStatus']);?>" class="adminform_input" required>
										</div>
									<?php } ?>
										<div class="adminform_div">
												<button type="submit" name="submit" class="adminform_btn">Update</button>
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
		    } );
		} );
</script>
</body>
<?php } ?>
