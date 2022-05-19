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
