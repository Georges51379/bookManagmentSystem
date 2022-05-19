<?php require_once "dataProcessing.php"; ?>
<?php
$email = $_SESSION['email'];
if($email == false){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Bookie | Create New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <center>
    <div class="container">
            <div class="form-div">
                <form action="new-password.php" method="POST" class="form" autocomplete="off">
                    <h2 class="text-center">New Password</h2>
                    <?php
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="success-div">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                        <input class="form-input" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-input" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="submitBtn" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
</center>
</body>
</html>
