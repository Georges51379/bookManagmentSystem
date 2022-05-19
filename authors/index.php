<?php require_once "dataProcessing.php";
if(strlen($_SESSION['email']) == 0 ){
  header("location: login-user.php");
}
else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Managment System</title>
    <link href="img/icons/logo.png" rel="shortcut icon"><!--ICONS SECTION-->
    <link href="css/admin.css" rel="stylesheet"><!--STYLE SECTION-->
  </head>
  <body>
    <center>
    <div class="container">
  					<div class="form-div">
  							<form action="index.php" class="form" method="POST" autocomplete="">
  									<h2 class="text-center">Login Form</h2>
  									<p class="text-center">Login with your email and password.</p>
  									<?php
  									if(count($errors) > 0){
  											?>
  											<div class="error-div">
  													<?php
  													foreach($errors as $showerror){
  															echo $showerror;
  													}
  													?>
  											</div>
  											<?php
  									}
  									?>
  									<div class="form-group">
  											<input class="form-input" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
  									</div><br>
  									<div class="form-group">
  											<input class="form-input" type="password" name="password" placeholder="Password" required>
  									</div>
  									<div class="right-link"><a href="forgot-password.php" class="lnks">Forgot password?</a></div><br>
  									<div class="form-group">
  											<input type="submit" class="submitBtn" name="login" value="Login">
  									</div>
                    <div class="center-link">Not yet a member? <a href="signup-user.php" class="lnk">Signup now</a></div>
  							</form>
  					</div>
  			</div>
      </center>
        <?php include 'includes/arrow_to_top.inc.php'; ?>
        <?php include 'includes/footer.inc.php'; ?>
  </body>
</html>
<?php } ?>
