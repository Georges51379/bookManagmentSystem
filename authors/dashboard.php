<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email']) === 0)
	{
header('location:index.php');
}
else{
	$getAuthorNameQuery = mysqli_query($con, "SELECT name FROM authors WHERE email = '".$_SESSION['email']."' ");
	$rw = mysqli_fetch_array($getAuthorNameQuery);
?>
<!DOCTYPE html>

<html>
  <head>
    <title>Book System | <?php echo htmlentities($rw['name']); ?></title>
		<link type="text/css" href="img/icons/logo.png" rel="shortcut icon">
		<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!--FONT AWESOME CDn-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!--STYLING SECTION-->
    <link href="css/admin.css" rel="stylesheet">

  </head>

  <body>
    <?php include 'includes/topnavigation.php'; ?>

<br><br><br>
<?php $query = mysqli_query($con, "SELECT name FROM authors WHERE email = '".$_SESSION['email']."' ");
$row = mysqli_fetch_array($query);
?>

		<div class="col-sm-9">
      <div class="well">
        <h4>Welcome</h4>
        <p><?php echo htmlentities($row['name']); ?></p>
      </div>

      <?php
      $featuredQuery = mysqli_query($con,"SELECT books.authorName, books.title, books.bookFeatured, authors.name FROM books JOIN authors ON books.authorName = authors.name WHERE bookFeatured = 1 AND email = '".$_SESSION['email']."'");
      while($rows = mysqli_fetch_array($featuredQuery)){
       ?>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Book Featured</h4>
            <p><?php echo htmlentities($rows['title']);?></p>
          </div>
        </div>
      </div>
    <?php } ?>
</div>

  </body>
<?php } ?>


<?php include 'includes/arrow_to_top.inc.php'; ?>
</html>
