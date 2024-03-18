<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=""width=device-width, initial-scale="1.0">
    <title>Local Streetware</title>
    <link rel="stylesheet" href="../vendor/fontawesome/css/all.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <link rel="stylesheet" href="../css/ls-homestyle.css">
</head>

<body>
    <!--Header-->
    <section id="LocalHeaderOptions">
        <a href="#"><img src="../img/logo/localstreetware_logo2.png" class="logo" alt=""> </a>
            
            <div>
                <ul id="headeroptions">
                    <li><a class="current" href="LS_home.php">Home</a></li>
                    <li><a href="LS_products.php">Products</a></li>
                    <li><a href="LS_about.php">About Us</a></li>
                    <li><a href="LS_login.php">Sign In</a></li>
                    <!-- <li><a href="LS_registration.php">Register</a></li> -->
                </ul>
            </div>
    </section>

    <!--HomePage-->
    <section id="landingpage">
        <h4>Your one-stop shop</h4>
        <h2>for your</h2>
        <h1>local streetware</h1>
        <p>Various clothing choices for your OOTD streetware! </p>
        <button>Buy Now</button>
    </section>

    <!--Features/quality ng Local Streetware-->
    <section id="lsfeatures" class="">
        <div class="con-feats"><div class="feats">
            <img src="../img/misc/ls_feat_1.png" alt="">
            <h6>Low-cost Shipping Fee</h6>
        </div></div>
        <div class="con-feats"><div class="feats">
            <img src="../img/misc/ls_feat_2.png" alt="">
            <h6>Budget-friendly Prices</h6>
        </div></div>
        <div class="con-feats"><div class="feats">
            <img src="../img/misc/ls_feat_3.png" alt="">
            <h6>Assorted clothing</h6>
        </div></div>
        <div class="con-feats"><div class="feats">
            <img src="../img/misc/ls_feat_4.png" alt="">
            <h6>Pre-loved Clothes</h6>
        </div></div>
        <div class="con-feats"><div class="feats">
            <img src="../img/misc/ls_feat_5.png" alt="">
            <h6>Local Products</h6>
        </div></div>
        

    </section>

    <!--Listings-->
    <section id="fproducts">
        <h2>Featured Items</h2>
        <p>New arrivals for your OOTD needs! Para pak na pak sa iyong OOTD photos!</p>
        <div class="container">  <!--Enter listings here -->
            <!-- -->
            <div class="fprod"> <!--Item1 -->
                <img src="../img/products/Item1.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Gray and Blue shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #491010;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item2 -->
                <img src="../img/products/Item2.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Black and White stripes shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item3 -->
                <img src="../img/products/Item3.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Black and Gray stripes shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item4 -->
                <img src="../img/products/Item4.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Gray patterned shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item5 -->
                <img src="../img/products/Item5.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Narrow white and black stripes </h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item6 -->
                <img src="../img/products/Item6.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Gray diamond-patterned shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item7 -->
                <img src="../img/products/Item7.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>Blue and white shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 

            <div class="fprod"> <!--Item8 -->
                <img src="../img/products/Item8.jpg" alt="">
                    <div class="fprod-desc">
                        <span>₱250.00</span>
                        <h5>White patterned shirt</h5>
                    </div>
                        <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
            </div> 
            </div> <!-- container end -->
    </section>

    <!--Show More-->
    <section id="ProdP2" class="section-m1">
        <h2>A <span>variety</span> of Tops, Bottoms, Shoes and Caps</h2>
        <button class="bdesc">Show More</button>
    </section>

    <!--Footer-->
    <?php include('../includes/ls-footer.php'); ?>
</body>
</html>