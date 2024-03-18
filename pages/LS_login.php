<?php require('session.php');?>
<?php if(logged_in()){ ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=""width=device-width, initial-scale="1.0">
    <title>Local Streetware</title>
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css"/>
    <link rel="stylesheet" href="../css/ls-loginstyle.css">
</head>

<body>
    <!--Header-->
    <section id="LocalHeaderOptions">
        <a href="#"><img src="../img/logo/localstreetware_logo2.png" class="logo" alt=""> </a>
            
            <div>
                <ul id="headeroptions">
                    <li><a href="LS_home.php">Home</a></li>
                    <li><a href="LS_products.php">Products</a></li>
                    <li><a href="LS_about.php">About Us</a></li>
                    <li><a class="current" href="LS_login.php">Sign In</a></li>
                    <!-- <li><a href="LS_registration.php">Register</a></li> -->
                </ul>
            </div>
    </section>

    <div class="bg-container">
        <!--Login Form-->
        <div class="log-container">
            <form action="processlogin.php" method="post">
                <h2>Login</h2>
                <div class="log-group">
                    <input type="email" placeholder="Email:" name="ls_email" class="form-control">
                </div>

                <div class="log-group">
                    <input type="password" placeholder="Password" name="ls_pass" class="form-control">
                </div>

                <div class="log-btn">
                    <input type="submit" value="Login" name="ls_login" class="btn btn-primary">
                </div>
            </form>

            <div>
                <p>Not registered yet?&nbsp;<a href="LS_registration.php">Register Here</a>.</p>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php include('../includes/ls-footer.php'); ?>
</body>

</html>