<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{
if(isset($_GET['del']))
		  {
		        mysqli_query($con,"UPDATE books SET bookStatus = 0 WHERE bookToken = '".$_GET['bName']."'");
                  $_SESSION['delmsg']="Book deleted !!";
		  }

			$getAuthorNameQuery = mysqli_query($con, "SELECT name FROM authors WHERE email = '".$_SESSION['email']."' ");
			$rw = mysqli_fetch_array($getAuthorNameQuery);
?>
<html>
<head>
	<title>Manage Books | <?php echo htmlentities($rw['name']); ?></title>
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
			<h1 class="title"> books</h1>
			<h4 class="subtitle"><a href="insertbooks.php" class="subtitle-link">insert book</a></h4>
		</div>

		<div class="wrapper">
		<?php if(isset($_GET['del']))
		{?>
		<div class="msgwrapper">
		<strong class="negativemsg">Oh Noo!</strong><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
		</div>
		<?php } ?>
		<br />
		<!--***********************************END ADD DELETE CATEGORY MSG*******************************************************-->
</div>
</center>
							<table id="datable" class="display" style="width:100%">
									<thead>
										<tr>
											<th id="custom_td">#</th>
											<th id="custom_td">title</th>
											<th id="custom_td">Category </th>
											<th id="custom_td">Subcategory</th>
											<th id="custom_td">brief</th>
                      <th id="custom_td">book Status (0,1)</th>
											<th id="custom_td">published Date</th>
											<th id="custom_td">update Date</th>
											<th id="custom_td">Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT books.*,category.categoryName,
subcategory.subcategoryName FROM books JOIN category ON category.categoryName=books.categoryName
JOIN subcategory ON subcategory.subcategoryName=books.subCategoryName JOIN authors ON books.authorName = authors.name WHERE email = '".$_SESSION['email']."'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['title']);?></td>
											<td><?php echo htmlentities($row['categoryName']);?></td>
											<td> <?php echo htmlentities($row['subcategoryName']);?></td>
											<td><?php echo htmlentities($row['brief']);?></td>
											<td><?php echo htmlentities($row['bookStatus']);?></td>
											<td><?php echo htmlentities($row['publishedDate']);?></td>
											<td><?php echo htmlentities($row['updatedDate']);?></td>
											<td>
											<a href="editbooks.php?bName=<?php echo $row['bookToken']?>" ><i class="fa fa-plus"></i></a>
											<a href="books.php?bName=<?php echo $row['bookToken']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a></td>
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
