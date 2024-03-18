<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Local Streetware</title>
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css"/>
    <link rel="stylesheet" href="../css/ls-registerstyle.css">
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
                    <!-- <li><a class="current" href="LS_registration.php">Register</a></li> -->
                    <li><a href="LS_cart.html"><i class="fas fa-shopping-basket"></i></a></li>
                </ul>
            </div>
    </section>

    <div class="bg-container">
        <!--RegistrationForm-->
        <div class="reg-container">
        <?php
            require('../includes/connection.php');
            require('session.php');
            
            if (isset($_POST["Submit"])) {
                $username = trim($_POST['ls_username']);
                $fullname = trim($_POST['ls_fullname']);
                $email = trim($_POST['ls_emailadd']);
                $phone = trim($_POST['ls_phone']);
                $password = trim($_POST['ls_password']);
                $confirmpass = trim($_POST['ls_confirmpass']);
                $type = "User";

                // Perform basic validation
                if (empty($username) || empty($fullname) || empty($email) || empty($phone) || empty($password) || empty($confirmpass)) {
                    echo "All fields are required.";
                } elseif ($password != $confirmpass) {
                    echo "Password and Confirm Password do not match.";
                } else {
                    // Check if the email is already registered
                    $check_email_sql = "SELECT id FROM users WHERE ls_email = '$email'";
                    $check_email_result = $db->query($check_email_sql);

                    if ($check_email_result && $check_email_result->num_rows > 0) {
                        echo "Email is already registered. Please use a different email.";
                    } else {
                        // Hash the password
                        $hashed_password = sha1($password);

                        // Insert user data into the database
                        $insert_user_sql = "INSERT INTO ls_users (ls_uname, ls_fname, ls_email, ls_phone, ls_password, ls_type) VALUES ('$username', '$fullname', '$email', '$phone', '$hashed_password','$type')";
                        $insert_user_result = $db->query($insert_user_sql);

                        if ($insert_user_result) {
                            echo "Registration successful. You can now login.";
                        } else {
                            echo "Error: " . $insert_user_sql . "<br>" . $db->error;
                        }
                    }
                }
            }

            $db->close();
        ?>

            <form action="LS_registration.php" method="post">
                <h2>Register</h2>
                <div class="reg-group">
                    <input type="text" class="reg-control" name="ls_username" placeholder="Username:" required>
                </div>
                <div class="reg-group">
                    <input type="text" class="reg-control" name="ls_fullname" placeholder="Full Name:" required>
                </div>
                <div class="reg-group">
                    <input type="email" class="reg-control" name="ls_emailadd" placeholder="Email Address:" required>
                </div>
                <div class="reg-group">
                    <input type="tel" class="reg-control" name="ls_phone" placeholder="Phone Number:" maxlength="11" required>
                </div>
                <div class="reg-group">
                    <input type="password" class="reg-control" name="ls_password" placeholder="Password:" required>
                </div>
                <div class="reg-group">
                    <input type="password" class="reg-control" name="ls_confirmpass" placeholder="Confirm Password:" required>
                </div>
                <div class="reg-button">
                    <input type="submit" class="reg-submit"value="Submit" name="Submit">
                </div>
            </form>
            <div>
                <p>Have an account already?&nbsp;<a href="LS_login.php">Sign in Here</a>.</p>
            </div>


        </div>
    </div>

    <!--Footer-->
    <?php include('../includes/ls-footer.php'); ?>
</body>

</html>