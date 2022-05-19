<?php
session_start();
error_reporting(0);
include 'db/connection.php';

if(strlen($_SESSION['email']) === 0){
  header("location: index.php");
}
else {
$catName=$_GET['catName'];

$getUserNameQuery = mysqli_query($con, "SELECT name FROM users WHERE email = '".$_SESSION['email']."' ");
$rw = mysqli_fetch_array($getUserNameQuery);

?>

<head>
<!--TITLE SECTION-->
    <title>Bookie | Category | <?php echo htmlentities($rw['name']);?></title>
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

  <div class="subcategory_wrapper">
    <h4 class="subcategory_title">sub category</h4>
    <nav class="subacategory_nav">
      <ul class="subcategory_list">
        <li class="subacategory_li">
          <?php $sql=mysqli_query($con,"SELECT subcategoryToken, subcategoryName FROM subcategory WHERE subcategoryStatus = 1 AND categoryToken='$catName' ");
while($row=mysqli_fetch_array($sql))
{
?>

            <a href="sub_category.php?subCatName=<?php echo $row['subcategoryToken'];?>" class="subcategory_link" style="display:hidden;"><i class="fa fa-product-hunt"></i>
            <?php echo $row['subcategoryName'];?></a>
            <?php } ?>
          </li>
      </ul>
    </nav>
  </div>

<br><br>
<section class="products_section">
    <?php
    $sql = mysqli_query($con, "SELECT categoryName FROM category WHERE categoryStatus = 1 AND categoryToken= '".$_GET['catName']."'");
    $row = mysqli_fetch_array($sql);

    $categoryname = $row['categoryName'];

$ret=mysqli_query($con,"SELECT * FROM books WHERE bookStatus=1 AND status = 'published' AND categoryName='$categoryname'");
$num=mysqli_num_rows($ret);
if($num>0)
{
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
<?php } ?>
</section>


<!--ARROW_TO_TOP.INC.PHP SECTION-->
  <?php include 'includes/arrow_to_top.inc.php'; ?>
<!--FOOTER.INC.PHP SECTION-->
  <?php include 'includes/footer.inc.php'; ?>
</body>
<?php } ?>
