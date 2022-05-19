<?php
  session_start();
  include 'db/connection.php';
  if(strlen($_SESSION['email']) === 0){
    header("location: index.php");
  }
  else{
    $getUserNameQuery = mysqli_query($con, "SELECT name FROM users WHERE email = '".$_SESSION['email']."' ");
    $rw = mysqli_fetch_array($getUserNameQuery);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookie | <?php echo htmlentities($rw['name']);?></title>
    <!--ICON SECTION-->
        <link href="img/icons/logo.png" rel="shortcut icon">
    <!--FONT AWESOME CDN SECTION-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!--jQUERY CDN SECTION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    		<link href="css/style.css" rel="stylesheet">
  </head>
  <body>



<div class="menu_wrapper">
 <header class="mainav_header">
   <div class="logo"><a  href="index.php" class="logo_link">bookie&nbspstore</a></div>
  <input class="menu_btn" type="checkbox" id="menu_btn" />
  <label class="menu_icon" for="menu_btn"><span class="navicon"></span></label>

  <ul class="mainnav_list">
    <li class="mainnav_li"><a href="books.php" class="mainnav_links">home</a></li>
      <?php
       $sql=mysqli_query($con,"SELECT categoryToken, categoryName FROM category WHERE categoryStatus = 1");

    while($row=mysqli_fetch_array($sql))
    {
    ?>
      <li class="mainnav_li">
        <a class="mainnav_links" href="category.php?catName=<?php echo $row['categoryToken'];?>"> <?php echo $row['categoryName'];?></a>
      </li>
    <?php } ?>

      </ul>
    </header>
</div>
<?php $nameQuery = mysqli_query($con, "SELECT name FROM users WHERE email = '".$_SESSION['email']."'");
$rows = mysqli_fetch_array($nameQuery); ?>
<center>
<div class="logout">
  <span class="name">welcome <?php echo htmlentities($rows['name']);?>,&emsp;</span>
  <a href="logout.php" class="logout-lnk">logout</a>
</div>
</center>

<?php include 'includes/banner.inc.php'; ?>




<section class="products_section">
  <h3 class="section_title">newest</h3>

      <?php
$ret=mysqli_query($con,"SELECT * FROM books WHERE bookStatus=1 order by publishedDate DESC limit 3");
while ($row=mysqli_fetch_array($ret))
{?>

  <div class="products_wrapper">
    <div class="product">
      <div class="product_img">
        <a href="book_details.php?bookName=<?php echo htmlentities($row['title']); ?>">
          <img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['title']);?>/<?php echo htmlentities($row['coverImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['title']);?>/<?php echo htmlentities($row['coverImage']);?>" >
        </a>
      </div>

      <div class="product_information">
        <div class="row">
          <div class="prod_details">
            <h3 class="product_name"><a class="#">
              <?php echo htmlentities($row['title']);?></a>
            </h3>

            <div class="product_price">
              <span class="price">

              <span class="original_price">
                  $<?php echo htmlentities($row['bookPrice']);?>
              </span>
              <span class="price_before_discount">$<?php echo htmlentities($row['bookPriceBeforeDiscount']);?>
              </span>
            </span>
            </div>
          </div><!--END DIV PROD_DETAILS-->
      </div><!---END ROW-->

      <div class="product_action">
      <?php if($row['bookAvailability']=='In Stock'){?>
        <a href="#" class="btn">
          <i class="fa fa-shopping-cart"></i>
        </a>

      <a class="btn" href="#">
      <i class="fa fa-heart"></i>
      </a>
      </div>

    <?php } else {?>
          <div class="btn">Out of Stock</div>
        <?php } ?>
      </div><!--PRODUCT INFORMATION--->

    </div><!--END PRODUCT-->

  </div><!--END PRODUCTS WRAPPER-->

  <?php } ?>
  </section>
</section>

<section class="products_section">
  <h3 class="section_title">featured</h3>

  <?php
  $ret=mysqli_query($con,"SELECT * FROM books where bookFeatured=1 and bookStatus=1 group by rand() limit 3");
  while ($row=mysqli_fetch_array($ret))
  {
  ?>
  <div class="products_wrapper">
    <div class="product">
      <div class="product_img">
        <a href="book_details.php?bookName=<?php echo htmlentities($row['title']); ?>">
          <img class="imgprod" src="admin/productimages/<?php echo htmlentities($row['title']);?>/<?php echo htmlentities($row['coverImage']);?>" data-echo="admin/productimages/<?php echo htmlentities($row['title']);?>/<?php echo htmlentities($row['coverImage']);?>" >
        </a>
      </div>

      <div class="product_information">
        <div class="row">
          <div class="prod_details">
            <h3 class="product_name"><a class="productname_link" href="#">
              <?php echo htmlentities($row['title']);?></a>
            </h3>

            <div class="product_price">
              <span class="price">

              <span class="original_price">
                  $<?php echo htmlentities($row['bookPrice']);?>
              </span>
              <span class="price_before_discount">$<?php echo htmlentities($row['bookPriceBeforeDiscount']);?>
              </span>

            </span>
            </div>
          </div><!--END DIV PROD_DETAILS-->
      </div><!---END ROW-->

      <div class="product_action">
      <?php if($row['bookAvailability']=='In Stock'){?>
        <a href="#" class="btn">
          <i class="fa fa-shopping-cart"></i>
        </a>

      <a class="btn" href="#">
      <i class="fa fa-heart"></i>
      </a>
      </div>

    <?php } else {?>
          <div class="btn">Out of Stock</div>
        <?php } ?>
      </div><!--PRODUCT INFORMATION--->

    </div><!--END PRODUCT-->

  </div><!--END PRODUCTS WRAPPER-->

  <?php } ?>
  </section>

</body>
<?php } ?>
</html>
