<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
	date_default_timezone_set('Asia/Beirut');
	$currentTime = date('d-m-Y h:i:s A', time() );

if(isset($_POST['submit']))//ss
{
  $categoryName=$_POST['categoryName'];
	$subcategoryName=$_POST['subcategoryName'];
	$title=$_POST['title'];
	$brief=$_POST['brief'];
	$authorName=$_POST['authorName'];
	$bookPrice=$_POST['bookPrice'];
	$bookPriceBeforeDiscount=$_POST['bookPriceBeforeDiscount'];
	$shippingCharge=$_POST['shippingCharge'];
	$bookStatus=$_POST['bookStatus'];
  $bookAvailability=$_POST['bookAvailability'];
	$bookFeatured=$_POST['bookFeatured'];
	$status = $_POST['status'];

$sql=mysqli_query($con,"UPDATE books SET categoryName='$categoryName',subcategoryName='$subcategoryName',title='$title',
brief='$brief',authorName='$authorName',bookPrice='$bookPrice', bookPriceBeforeDiscount='$bookPriceBeforeDiscount',shippingCharge='$shippingCharge',bookStatus='$bookStatus',
bookAvailability='$bookAvailability',bookFeatured='$bookFeatured',status = '$status',updatedDate='$currentTime'
WHERE bookToken = '".$_GET['bName']."'");
$_SESSION['msg']="Book has been Updated Successfully !!";
header("location:books.php");
}
?>

<html lang="en">
<head>
	<title>Admin | Edit Book</title>
	<link type="text/css" href="img/icons/logo.png" rel="shortcut icon">
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--FONT AWESOME CDN SECTION-->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--jQUERY CDN SECTION-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

			<link href="css/admin.css" rel="stylesheet">

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "getsubcat.php",
	data: 'categoryName='+$("#categoryName").val(),
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
</script>

</head>

<body>
	<?php include('includes/topnavigation.php');?>

<center>
	<div class="container">
	<div class="titlewrapper">
		<h3 class="title">edit books</h3>
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

<?php
$showBookQuery=mysqli_query($con,"SELECT books.*,category.categoryName AS catname,subcategory.subcategoryName AS subcatname
	 FROM books JOIN category ON category.categoryName=books.categoryName JOIN subcategory ON subcategory.subcategoryName=books.subcategoryName
   WHERE books.bookToken='".$_GET['bName']."' ");

$cnt=1;
while($row=mysqli_fetch_array($showBookQuery))
{
?>
<!--ERRORRR-->
									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Category</label><br>
										<select name="categoryName" id="categoryName" class="adminform_select" onChange="getSubcat(this.value);"  required>
										<option value="<?php echo htmlentities($row['catname']);?>"><?php echo htmlentities($row['catname']);?></option>
										<?php $query=mysqli_query($con,"SELECT * FROM category");
										while($rw=mysqli_fetch_array($query))
										{
											if($row['catname']==$rw['categoryName'])
											{
												continue;
											}
											else{
											?>
										<option value="<?php echo $rw['categoryName'];?>"><?php echo $rw['categoryName'];?></option>
										<?php }} ?>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Sub Category</label><br>
										<select   name="subcategoryName"  id="subcategory" class="adminform_select" required>
											<option value="<?php echo htmlentities($row['subcatname']);?>"><?php echo htmlentities($row['subcatname']);?></option>
										</select>
									</div>
<!--end ERRORRR-->

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">title</label><br>
										<input type="text"    name="title"  placeholder="Enter title " value="<?php echo htmlentities($row['title']);?>" class="adminform_input" >
									</div>

                  <div class="adminform_div">
										<label class="adminform_label" for="basicinput">Brief</label><br>
										<textarea  name="brief" class="adminform_textarea">
											<?php echo htmlentities($row['brief']);?>
										</textarea>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">author name</label><br>
										<input type="text"    name="authorName"  placeholder="Enter Author name " value="<?php echo htmlentities($row['authorName']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">Book Price Before Discount</label><br>
										<input type="text"    name="bookPriceBeforeDiscount"  placeholder="Enter Book Price" value="<?php echo htmlentities($row['bookPriceBeforeDiscount']);?>"  class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">book Price</label><br>
										<input type="text"    name="bookPrice"  placeholder="Enter book Price"	value="<?php echo htmlentities($row['bookPrice']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">book Shipping Charge</label><br>
										<input type="text"    name="shipingCharge"  placeholder="Enter book Shipping Charge"	 value="<?php echo htmlentities($row['shippingCharge']);?>" class="adminform_input" required>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">book Availability</label><br>
										<select   name="bookAvailability"  id="bookAvailability" class="adminform_select" required>
										<option value="<?php echo htmlentities($row['bookAvailability']);?>"><?php echo htmlentities($row['bookAvailability']);?></option>
										<option value="In Stock">In Stock</option>
										<option value="Out of Stock">Out of Stock</option>
										</select>
									</div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">book status</label><br>
										<select   name="status"  id="status" class="adminform_select" required>
											<option value="<?php echo htmlentities($row['status']);?>"><?php echo htmlentities($row['status']);?></option>
											<option value="draft">draft</option>
											<option value="published">published</option>
										</select>
									</div>

                  <div class="adminform_div">
                    <label class="adminform_label" for="basicinput">Book Status Availability</label><br>
                    <input type="text" name="bookStatus"  placeholder="Enter book status" value="<?php echo htmlentities($row['bookStatus']);?>" class="adminform_input" >
                  </div>

									<div class="adminform_div">
										<label class="adminform_label" for="basicinput">book featured</label><br>
										<input type="text" name="bookFeatured"  placeholder="Enter book featured" value="<?php echo htmlentities($row['bookFeatured']);?>" class="adminform_input" >
									</div>

									<div class="adminform_div">
									<label class="adminform_label" for="basicinput">Book Image</label><br>
									<img src="productimages/<?php echo htmlentities($row['title']);?>/<?php echo htmlentities($row['coverImage']);?>"
									width="60" height="60">
									<a href="updateimage.php?bName=<?php echo $row['title'];?>">Change Image</a>
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
		    });
				});
</script>
</body>
<?php } ?>
