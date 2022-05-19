<?php
  session_start();
  include 'db/connection.php';
  if(strlen($_SESSION['email']) === 0){
    header("location: index.php");
  }
  else{
    $bookname = $_GET['bookName'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookie | <?php echo $bookname; ?></title>
    <!--ICON SECTION-->
        <link href="img/icons/logo.png" rel="shortcut icon">
    <!--FONT AWESOME CDN SECTION-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--jQUERY CDN SECTION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link href="css/style.css" rel="stylesheet">
  </head>

  <body>
    <?php include 'includes/topnavigation.php'; ?>

<?php
  $getProductQuery = mysqli_query($con," SELECT * FROM books WHERE title = '$bookname' ");
  while($rw = mysqli_fetch_array($getProductQuery)){
 ?>
    <div class="detail-wrapper">
    <center>
      <div class="img-wrapper">
        <img class="imgdetail" src="admin/productimages/<?php echo htmlentities($rw['title']);?>/<?php echo htmlentities($rw['coverImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($rw['title']);?>/<?php echo htmlentities($rw['coverImage']);?>">

      </div>
      <div class="information">
        <h2><?php echo htmlentities($rw['title']); ?></h2>
        <h4><?php echo htmlentities($rw['brief']); ?></h4>
          <div class="price-wrapper">
            <h6 class="discountedPrice"><?php echo htmlentities($rw['bookPrice']); ?></h6>&nbsp
            <h6 class="price"><?php echo htmlentities($rw['bookPriceBeforeDiscount']); ?></h6>
          </div><br>
        <span class="availability"><?php echo htmlentities($rw['bookAvailability']); ?></span>
      </div>
      </center>
    </div>
  <?php } ?> <!--END WHILE FOR GET PRODUCT QUERY-->

    <?php include 'includes/arrow_to_top.inc.php'; ?>
    <?php include 'includes/footer.inc.php'; ?>
  </body>
<?php } ?>
</html>
