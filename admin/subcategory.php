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
	$categoryName=$_POST['categoryName'];
	$subcategoryName=$_POST['subcategoryName'];
	$subcategoryDescription=$_POST['subcategoryDescription'];
	$subcategoryStatus=$_POST['subcategoryStatus'];

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';

	for ($i = 0 ; $i <= 10; $i++){
		$index = rand(0, strlen($characters) - 1);
		$hashedString .= $characters[$index];
	}

	$subcategoryToken = $hashedString;
	$_SESSION['subcategoryToken'] = $subcategoryToken;

$sql=mysqli_query($con,"INSERT INTO subcategory(categoryToken, categoryName, subcategoryToken,subcategoryName, subcategoryDescription,subcategoryStatus)
                  VALUES('".$_SESSION['categoryToken']."', '$categoryName', '".$_SESSION['subcategoryToken']."','$subcategoryName', '$subcategoryDescription', '$subcategoryStatus')");
$_SESSION['msg']="SubCategory Created !!";
}
if(isset($_GET['del']))
		  {
		          mysqli_query($con,"UPDATE subcategory SET subcategoryStatus = 0 WHERE subcategoryToken = '".$_GET['subcatName']."'");
                  $_SESSION['delmsg']="SubCategory deleted !!";
		  }
if(isset($_POST['truncateSubCategoryTable'])){
			mysqli_query($con,"TRUNCATE TABLE subcategory");
			$_SESSION['delmsg'] = "TABLE HAS BEEN EMPTY SUCCESSFULLY!!";
}
?>
<html lang="en">
<head>
	<title>Admin | Sub Category</title>
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
		<h3 class="title">sub category</h3>
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
	<button type="submit" name="truncateSubCategoryTable" class="adminform_btn">Empty Table</button>
</form>

			<form class="admin_form" name="subcategory" method="post" >

										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">Category</label><br>
											<select name="categoryName" class="adminform_select" required>
												<option value="">Select Category</option>
										<?php $query=mysqli_query($con,"SELECT * FROM category");
										while($row=mysqli_fetch_array($query))
										{?>
											<option value="<?php echo $row['categoryName'];?>"><?php echo $row['categoryName'];?></option>
										<?php } ?>
											</select>

										</div>
										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">SubCategory Name</label><br>
											<input type="text" placeholder="Enter SubCategory Name"  name="subcategoryName" class="adminform_input" required>
										</div>

										<div class="adminform_div">
												<label class="adminform_label" for="basicinput">Description</label><br>
												<textarea class="adminform_textarea" name="subcategoryDescription" rows="5"></textarea>
										</div>

										<div class="adminform_div">
											<label class="adminform_label" for="basicinput">SubCategory Status</label><br>
											<input type="text" placeholder="Enter SubCategory Status"  name="subcategoryStatus" class="adminform_input" required>
										</div>

											<div class="adminform_div">
												<button type="submit" name="submit" class="adminform_btn">Create</button>
											</div>
									</form>
							</div>
						</div>
					</div>
				</center>

						<div class="titlewrapper">
							<h3 class="title">manage sub categories</h3>
						</div>
						<br><br>

								<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">ID</th>
											<th id="custom_td">Category</th>
											<th id="custom_td">subcategory Name</th>
											<th id="custom_td">Description</th>
											<th id="custom_td">STATUS</th>
											<th id="custom_td">Create date</th>
											<th id="custom_td">Last Updated</th>
											<th id="custom_td">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT subcategory.id,category.categoryName,subcategory.subcategoryName,subcategory.subcategoryToken,
subcategory.subcategoryDescription, subcategory.subcategoryStatus, subcategory.createDate,
subcategory.updateDate FROM subcategory JOIN category ON category.categoryName=subcategory.categoryName");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['categoryName']);?></td>
											<td><?php echo htmlentities($row['subcategoryName']);?></td>
											<td><?php echo htmlentities($row['subcategoryDescription']);?></td>
											<td><?php echo htmlentities($row['subcategoryStatus']);?></td>
											<td> <?php echo htmlentities($row['createDate']);?></td>
											<td><?php echo htmlentities($row['updateDate']);?></td>
											<td>
											<a href="editsubcategory.php?subcatName=<?php echo $row['subcategoryToken']?>" ><i class="fa fa-plus"></i></a>
											<a href="subcategory.php?subcatName=<?php echo $row['subcategoryToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
										</tr>
										<?php $cnt=$cnt+1; } ?>
								</table>
							</div>
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
		    } );
		} );
</script>
</body>
<?php } ?>
