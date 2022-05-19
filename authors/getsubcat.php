<?php
include('db/connection.php');
if(!empty($_POST["categoryName"]))
{
 $categoryName=$_POST['categoryName'];

$query=mysqli_query($con,"SELECT * FROM subcategory WHERE categoryName='$categoryName'");
?>
<option value="">Select Sub Category</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['subcategoryName']); ?>"><?php echo htmlentities($row['subcategoryName']); ?></option>
  <?php
 }
}
?>
