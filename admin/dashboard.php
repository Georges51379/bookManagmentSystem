<?php
session_start();
include('db/connection.php');
if(strlen($_SESSION['email'])==0)
	{
header('location:index.php');
}
else{

?>
<!DOCTYPE html>

<html>
  <head>
    <title>Book System | Admin</title>
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

		<script>
		function authorName(val) {
			$.ajax({
			type: "POST",
			url: "getAuthor.php",
			data: 'name='+$("#name").val(),
			success: function(data){
				$("#booksOfSelectedAuthor").html(data);
			}
			});
		}
		</script>
  </head>

  <body>
    <?php include 'includes/topnavigation.php'; ?>

<br><br><br>

		<div class="col-sm-9">
			<?php $queryAllAuthors = mysqli_query($con, "SELECT name FROM authors");
			$rw = mysqli_num_rows($queryAllAuthors);
			$numbUsers = $rw;

			$queryAllUsers = mysqli_query($con, "SELECT name FROM users");
	  	$row = mysqli_num_rows($queryAllAuthors);

		?>

      <div class="row">
        <div class="col-sm-3">
          <div class="well">
            <h4>Authors</h4>
            <p><?php echo $numbUsers; ?></p>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="well">
            <h4>Users</h4>
            <p>  <?php echo $row; ?></p>
          </div>
        </div>
        <div class="col-sm-3">
					<?php $queryAllBook = mysqli_query($con, "SELECT MAX(id) as id FROM books");
	      while($rw = mysqli_fetch_array($queryAllBook)){
	    			?>
          <div class="well">
            <h4>Books</h4>
            <p><?php echo htmlentities($rw['id']); ?>
						</p>
          </div>
        </div>
      </div>
				<?php }//END WHILE ?>


				<div class="row">
        <div class="col-sm-4">
          <div class="well">
						<form method="post">
											<div class="dropdown-author">
												<label for="author">Select Author:</label>
												<select name="name" onChange="authorName(this.value);" id="name" class="select-input">
													<option value="Select Author Name Below...">Select Author Name Below...</option>
													<?php $getAuthorQuery = mysqli_query($con, "SELECT name FROM authors");
													 			while($rws = mysqli_fetch_array($getAuthorQuery)){?>
													<option value="<?php echo htmlentities($rws['name']); ?>"><?php echo htmlentities($rws['name']); ?></option>
												<?php } ?>
												</select>
											</div>
											<div class="author">
												<span id="booksOfSelectedAuthor"></span>
											</div>
					</form>
          </div>
        </div>
			</div><!--END ROW-->
</div>

  </body>
<?php } ?>

<?php include 'includes/arrow_to_top.inc.php'; ?>
</html>
