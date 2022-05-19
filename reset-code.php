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
    <title>Bookie | Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/icons/logo.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <center>
    <div class="container">
            <div class="form-div">
                <form action="reset-code.php" method="POST" class="form" autocomplete="off">
                    <h2 class="text-center">Code Verification</h2>
                    <?php
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="success-div" style="padding: 0.4rem 0.4rem">
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
                        <input class="form-input" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="form-group">
                        <input class="submitBtn" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </form>
            </div>
        </div>
</center>
</body>
</html>
