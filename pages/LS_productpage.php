<?php
    require('../includes/connection.php');
    $idg = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=""width=device-width, initial-scale="1.0">
    <title>Local Streetware</title>
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css"/>
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="../css/LS-productdetails.css">
</head>

<body>
    <!--Header-->
    <section id="LocalHeaderOptions">
        <a href="#"><img src="../img/logo/localstreetware_logo2.png" class="logo" alt=""> </a>
            
            <div>
                <ul id="headeroptions">
                    <li><a href="LS_home.php">Home</a></li>
                    <li><a class="current" href="LS_products.php">Products</a></li>
                    <li><a href="LS_about.php">About Us</a></li>
                    <li><a href="LS_login.php">Sign In</a></li>
                    <!-- <li><a href="LS_registration.php">Register</a></li> -->
                </ul>
            </div>
    </section>
    <?php
        $query = 'SELECT * FROM product WHERE PRODUCT_ID = '.$idg;
        $result = mysqli_query($db, $query);
        $product = mysqli_fetch_assoc($result)
    ?>
    <section id="pdetail" class="section-p1">
            <div class="pdetail-img">
                <img src="../img/products/<?php echo $product['PRODUCT_IMG']; ?>" width="100%" id="pView" alt="">
                    <div>

                    </div>
            </div>
            <!--Edit Item Details here-->
            <div class="lsdetails">
                <h6>Unbranded</h6><!--Item Brand-->
                <h4><?php echo $product['NAME']; ?></h4>   <!--Item Name-->
                <h2>₱<?php echo $product['PRICE'] ?></h2>  <!--Item Price-->
            
                <!-- <select>
                    <option>Select Size</option>
                    <option>XL</option>
                    <option>L</option>
                    <option>M</option>
                    <option>S</option>
                    <option>XS</option>
                </select>

                <input type="number" value="1" min="1">
                <button class="normal">Add to Cart</button>
                <button class="normal" onclick="window.location.href='LS_checkoutpage.php';">Buy</button> -->



                <!--Item Description-->
                <h4>Item Description</h4>
                <span><?php echo $product['DESCRIPTION']; ?></span>
            </div>
    </section>


    <!--Footer-->
    <?php include('../includes/ls-footer.php'); ?>
</body>

</html>