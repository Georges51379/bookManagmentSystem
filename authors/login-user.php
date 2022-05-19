<html>
<?php require_once "dataProcessing.php"; ?>
<head>
  <meta charset="UTF-8">
  <title>Author Login</title>
  <link href="img/icons/logo.png" rel="shortcut icon">
  <link href="css/admin.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!--jQUERY CDN SECTION-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="shortcut icon" href="img/icons/logo.png">

</head>
<body>
  <center>
<div class="container">
        <div class="form-div">
            <form action="login-user.php" class="form" method="POST" autocomplete="">
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
                </div>
                <div class="form-group">
                    <input class="form-input" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="right-link"><a href="forgot-password.php" class="lnks">Forgot password?</a></div>
                <div class="form-group">
                    <input type="submit" class="submitBtn" name="login" value="Login">
                </div>
                <div class="center-link">Not yet a member? <a href="signup-user.php" class="lnk">Signup now</a></div>
            </form>
        </div>
    </div>
  </center>
</body>
</html>
