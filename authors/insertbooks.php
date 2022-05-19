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
	$title=$_POST['title'];
	$brief=$_POST['brief'];
	$authorName=$_POST['authorName'];
	$bookPrice=$_POST['bookPrice'];
	$bookPriceBeforeDiscount=$_POST['bookPriceBeforeDiscount'];
	$shippingCharge=$_POST['shippingCharge'];
	$bookStatus=$_POST['bookStatus'];
  $bookAvailability=$_POST['bookAvailability'];
  $status=$_POST['status'];
	$coverImage=$_FILES['coverImage']['name'];


	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$hashedString = '';

for ($i = 0 ; $i <= 10; $i++){
	  $index = rand(0, strlen($characters) - 1);
	  $hashedString .= $characters[$index];
}
$_SESSION['bookToken'] = $hashedString;

//insert variable to DB
$sql=mysqli_query($con,"INSERT INTO books (categoryName,subcategoryName,bookToken,title,brief,authorName,bookPrice,bookPriceBeforeDiscount,
shippingCharge,bookStatus, bookAvailability,status,coverImage) VALUES('$categoryName','$subcategoryName','".$_SESSION['bookToken']."',
'$title','$brief','$authorName','$bookPrice','$bookPriceBeforeDiscount','$shippingCharge','$bookStatus','$bookAvailability',
'$status','$coverImage')");

$_SESSION['msg']="Book Inserted Successfully !!";


//SOLVED
$bookFileName = '';
	//DEBUGGING THE ERROR
$GetMaxIDQuery = mysqli_query($con, "SELECT MAX(id) AS maxID FROM books");
  $fetchID = mysqli_fetch_array($GetMaxIDQuery);
	$maxIds = $fetchID['maxID']; // WORKED FINE!

for($x = 1; $x <= $maxIds; $x++){
	$query = mysqli_query($con, "SELECT title FROM books WHERE id = $x ");
		$row = mysqli_fetch_array($query);
		$bookFileName = $row['title'];

		$directory = "productimages/".$bookFileName;

		if(!file_exists($directory)){ // THE ERROR IS HERE
		 mkdir('productimages/'.$bookFileName);
	 	}

}//end FOR
move_uploaded_file($_FILES["coverImage"]["tmp_name"],"productimages/$bookFileName/".$_FILES["coverImage"]["name"]);

}
?>
<html lang="en">
<head>
	<title>Admin | Insert Book</title>
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
	url: "getsubcat.php",
	data: 'categoryName='+$("#categoryName").val(),
	type: "POST",
	success: function(data){
		$("#subcategoryName").html(data);
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
		<h3 class="title">insert book</h3>
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
				<label class="adminform_label" for="basicinput">Category</label><br>
				<select name="categoryName" id="categoryName"  class="adminform_select" onchange="getSubcat()"  required>
				<option value="">Select Category</option>
				<?php $query=mysqli_query($con,"SELECT * FROM category");
				while($row=mysqli_fetch_array($query))
				{?>
				<option value="<?php echo htmlentities($row['categoryName']);?>"><?php echo htmlentities($row['categoryName']);?></option>
				<?php } ?>
				</select>
				</div>

				<div class="adminform_div">
				<label class="adminform_label" for="basicinput">Sub Category</label><br>
				<select name="subcategoryName" id="subcategoryName" class="adminform_select" required>
				</select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Book title</label><br>
					<input type="text"    name="title"  placeholder="Enter book title" class="adminform_input" required>
				</div>

        <div class="adminform_div">
					<label class="adminform_label" for="basicinput">book Description</label><br>
					<textarea  name="brief"  placeholder="Enter book Description" rows="6" class="adminform_textarea">
					</textarea>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">author Name</label><br>
					<input type="text"    name="authorName"  placeholder="Enter Author Name " class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Book Price Before Discount</label><br>
					<input type="text"    name="bookPriceBeforeDiscount"  placeholder="Enter book Price" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">Book Price After Discount(Selling Price)</label><br>
					<input type="text"    name="bookPrice"  placeholder="Enter book Price" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">book Shipping Charge</label><br>
					<input type="text"    name="shippingCharge"  placeholder="Enter book Shipping Charge" class="adminform_input" required>
				</div>

        <div class="adminform_div">
					<label class="adminform_label" for="basicinput">book Status Availability</label><br>
					<input type="text"    name="bookStatus"  placeholder="Enter book Status" class="adminform_input" required>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">book Availability</label><br>
					<select   name="bookAvailability"  id="bookAvailability" class="adminform_select" required>
					<option value="">Select</option>
					<option value="In Stock">In Stock</option>
					<option value="Out of Stock">Out of Stock</option>
					</select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">book status</label><br>
					<select   name="status"  id="status" class="adminform_select" required>
						<option value="">Select book status</option>
						<option value="draft">draft</option>
					</select>
				</div>

				<div class="adminform_div">
					<label class="adminform_label" for="basicinput">cover Image</label><br>
					<input type="file" name="coverImage" id="coverImage" value="" class="adminform_input" required>
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
