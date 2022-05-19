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

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"UPDATE authors SET authorStatus = 0 WHERE id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="author deleted !!";
		  }
?>
<html lang="en">
<head>
	<title>Admin| Manage Authors</title>
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
					<h3 class="title">manage authors</h3>
					<h4 class="subtitle"><a class="subtitle-link" href="insertauthor.php">insert author</a></h4>
				</div>

				<div class="wrapper">
	<?php if(isset($_GET['del']))
	{?>
						<div class="msgwrapper">
						<strong class="msg">Oh Noo!</strong><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
						</div>
	<?php } ?>
						<br />
</center>
									<table id="datable" class="display" style="width:100%">
										<thead>
											<tr>
											<th id="custom_td">ID</th>
											<th id="custom_td">Name</th>
											<th id="custom_td">Email</th>
											<th id="custom_td">Birth Date</th>
											<th id="custom_td">status</th>
											<th id="custom_td">authors Status</th>
											<th id="custom_td">Reg Date </th>
											<th id="custom_td">Last Updated</th>
											<th id="custom_td">action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"SELECT * FROM authors");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
										<tr id="custom_tr">
											<td><?php echo htmlentities($cnt);?></td>
											<td id="cap_username"><?php echo htmlentities($row['name']);?></td>
											<td><?php echo htmlentities($row['email']);?></td>
											<td> <?php echo htmlentities($row['birthDate']);?></td>
											<td> <?php echo htmlentities($row['status']);?></td>
											<td> <?php echo htmlentities($row['authorStatus']);?></td>
											<td><?php echo htmlentities($row['registrationDate']);?></td>
											<td><?php echo htmlentities($row['updateDate']);?></td>
											<td>
												<a href="editAuthors.php?id=<?php echo $row['id']?>" ><i class="fa fa-plus"></i></a>
												<a href="authors.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-times"></i></a>
											</td>
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
