<?php require_once "dataProcessing.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Author Singup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--jQUERY CDN SECTION-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/admin.css">

    <script>
    function checkName() {
      jQuery.ajax({
        url: "check/checkNameAvailability.php",
        data: 'name='+$("#name").val(),
        type: "POST",
        success:function(data){
          $("#nameAvailability").html(data);
        },
        error:function(){}
      });
    }

    //EMAIL function
    function checkEmail() {
      jQuery.ajax({
        url: "check/checkEmailAvailability.php",
        data: 'email='+$("#email").val(),
        type: "POST",
        success:function(data){
          $("#emailAvailability").html(data);
        },
        error:function(){}
      });
    }

    //PASSWORD function
    function checkPassword() {
      jQuery.ajax({
        url: "check/checkPasswordAvailability.php",
        data: 'password='+$("#password").val(),
        type: "POST",
        success:function(data){
          $("#passwordAvailability").html(data);
        },
        error:function(){}
      });
    }

    </script>
</head>
<body>
  <center>
    <div class="container">
            <div class="form-div">
                <form action="signup-user.php" class="form" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="error-div">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="error-div">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-input" type="text" name="name" id="name" onblur="checkName()" placeholder="Full Name" required value="<?php echo $name ?>">
                        <br><span class="error-section" id="nameAvailability"></span>
                    </div>
                    <div class="form-group">
                        <input class="form-input" type="email" id="email" name="email" onblur="checkEmail()" placeholder="Email Address" required value="<?php echo $email ?>">
                        <br><span class="error-section" id="emailAvailability"></span>
                    </div>

                    <div class="form-group">
                        <input class="form-input" type="password" id="password" name="password" onblur="checkPassword()" placeholder="Password" required>
                        <br><span class="error-section" id="passwordAvailability"></span>
                    </div>
                    <div class="form-group">
                        <input class="form-input" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-input" type="date" name="birthDate" placeholder="birth Date" required>
                    </div>
                    <div class="form-group">
                        <input class="form-input" type="text" name="authorBio" placeholder="Author Bio" required>
                    </div>

                    <div class="form-group">
                        <input class="submitBtn" type="submit" id="btn" name="signup" value="Signup">
                    </div>
                    <div class="center-link">Already a member? <a class="lnk" href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
      </center>

</body>
</html>
