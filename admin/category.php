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

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';

	for ($i = 0 ; $i <= 10; $i++){
	  $index = rand(0, strlen($characters) - 1);
	  $hashedString .= $characters[$index];
	}

$_SESSION['categoryToken'] = $hashedString;

$sql = mysqli_query($con,"INSERT INTO category(categoryToken, categoryName,categoryDescription, categoryStatus)
                    VALUES('".$_SESSION['categoryToken']."', '$categoryName','$categoryDescription', '$categoryStatus')");
$_SESSION['msg']="Category Created !!";
}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"UPDATE category SET categoryStatus = 0 WHERE categoryToken = '".$_GET['catName']."'");
                  $_SESSION['delmsg']= "Category deleted !!";
		  }

if(isset($_POST['truncateCategoryTable'])){
			mysqli_query($con,"TRUNCATE TABLE category");
			$_SESSION['delmsg'] = "TABLE HAS BEEN EMPTY SUCCESSFULLY!!";
}
?>

<html lang="en">
<head>
	<title>Admin| Category</title>
	<link type="text/css" href="img/icons/logo.png" rel="shortcut icon">
	<link href="css/admin.css" rel="stylesheet"/>
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
  <!--JQUERY cdn-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!--FONT AWESOME CDn-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

			<link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.2/css/uikit.min.css" rel="stylesheet">
			<link href="https://cdn.datatables.net/1.11.5/css/dataTables.uikit.min.css" rel="stylesheet">
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
<form method="post">
	<h2>Empty Table:</h2>
	<button type="submit" name="truncateCategoryTable" class="adminform_btn">Empty Table</button>
</form>

			<form class="admin_form" name="Category" method="post" >
					<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Category Name</label><br>
						<input type="text" placeholder="Enter category Name"  name="categoryName" class="adminform_input" required>
					</div>
					<div class="adminform_div">
							<label class="adminform_label" for="basicinput">Description</label><br>
							<textarea class="adminform_textarea" name="categoryDescription" rows="5"></textarea>
					</div>

					<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Category Status</label><br>
						<input type="text" placeholder="Enter category Status"  name="categoryStatus" class="adminform_input" required>
					</div>

						<div class="adminform_div">
							<button type="submit" name="submit" class="adminform_btn">Create</button>
						</div>
			</form>
		</div><!--END WRAPPER div-->
</div>
</center>

							<div class="titlewrapper">
								<h3 class="title">Manage Categories</h3>
							</div>
							<br><br>

						<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">ID</th>
											<th id="custom_td">Category</th>
											<th id="custom_td">Description</th>
											<th id="custom_td">Status</th>
											<th id="custom_td">Create date</th>
											<th id="custom_td">Last Updated</th>
											<th id="custom_td">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT * FROM category");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['categoryName']);?></td>
											<td><?php echo htmlentities($row['categoryDescription']);?></td>
											<td><?php echo htmlentities($row['categoryStatus']);?></td>
											<td> <?php echo htmlentities($row['createDate']);?></td>
											<td><?php echo htmlentities($row['updateDate']);?></td>
											<td>
											<a href="editcategory.php?catName=<?php echo $row['categoryToken']?>" ><i class="fa fa-plus"></i></a>
											<a href="category.php?catName=<?php echo $row['categoryToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
								</table>
							</div>

<?php include('includes/footer.inc.php');?>
<?php include 'includes/arrow_to_top.inc.php'; ?>

<!--DATATABLES SECTION JS-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!--END DATATABLES SECTION JS-->

<script>
$(document).ready(function() {
$('#datable').DataTable();
responsive: true
} );
</script>
</body>
<?php } ?>
