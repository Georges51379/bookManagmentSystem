<?php
include('db/connection.php');
if(!empty($_POST["name"]))
{
 $name=$_POST['name'];

$query=mysqli_query($con,"SELECT title FROM books WHERE authorName='$name'");
?>
<option value="">Books Are:</option>
<?php
 while($row=mysqli_fetch_array($query))
 {
  ?>
  <option value="<?php echo htmlentities($row['title']); ?>"><?php echo htmlentities($row['title']); ?></option>
  <?php
}
}
?>
