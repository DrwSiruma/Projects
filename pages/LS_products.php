<?php
    require('../includes/connection.php');
    require('session.php');
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
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/ls-product.css">
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

    <!--Listings-->
    <section id="fproducts">
            <div class="tabset">
                <!-- Tab 1 -->
                <input type="radio" name="tabset" id="tab1" aria-controls="shirts" checked>
                <label for="tab1">Shirts</label>
                <!-- Tab 2 -->
                <input type="radio" name="tabset" id="tab2" aria-controls="shoes">
                <label for="tab2">Shoes</label>
                <!-- Tab 3 -->
                <input type="radio" name="tabset" id="tab3" aria-controls="slippers">
                <label for="tab3">Slippers</label>
                <!-- Tab 4 -->
                <input type="radio" name="tabset" id="tab4" aria-controls="necklace">
                <label for="tab4">Necklace</label>
                
                <div class="tab-panels">
                    <section id="shirts" class="tab-panel">
                        <div class="container">  <!--Enter listings here -->
                        <?php
                            $query = 'SELECT * FROM product WHERE CATEGORY_ID=8 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
                            $result = mysqli_query($db, $query);

                            if ($result):
                                if(mysqli_num_rows($result)>0):
                                    while($product = mysqli_fetch_assoc($result)): ?>
                                        <div class="fprod" onclick="window.location.href='LS_productpage.php?id=<?php echo $product['PRODUCT_ID']; ?>';"> <!--Item1 -->
                                            <img src="../img/products/<?php echo $product['PRODUCT_IMG'] ?>" alt="">
                                            <div class="fprod-desc">
                                                <span>₱ <?php echo $product['PRICE']; ?></span>
                                                <h5><?php echo $product['NAME']; ?></h5>
                                            </div>
                                            <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
                                        </div> 
                                    <?php endwhile;
                                endif;
                            endif;   
                        ?>
                        </div> <!-- container end -->
                    </section>
                    <section id="shoes" class="tab-panel">
                        <div class="container">  <!--Enter listings here -->
                        <?php
                            $query = 'SELECT * FROM product WHERE CATEGORY_ID=0 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
                            $result = mysqli_query($db, $query);

                            if ($result):
                                if(mysqli_num_rows($result)>0):
                                    while($product = mysqli_fetch_assoc($result)): ?>
                                        <div class="fprod" onclick="window.location.href='LS_productpage.php?id=<?php echo $product['PRODUCT_ID']; ?>';"> <!--Item1 -->
                                            <img src="../img/products/<?php echo $product['PRODUCT_IMG'] ?>" alt="">
                                            <div class="fprod-desc">
                                                <span>₱ <?php echo $product['PRICE']; ?></span>
                                                <h5><?php echo $product['NAME']; ?></h5>
                                            </div>
                                            <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
                                        </div> 
                                    <?php endwhile;
                                endif;
                            endif;   
                        ?>
                        </div> <!-- container end -->
                    </section>
                    <section id="slippers" class="tab-panel">
                        <div class="container">  <!--Enter listings here -->
                        <?php
                            $query = 'SELECT * FROM product WHERE CATEGORY_ID=6 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
                            $result = mysqli_query($db, $query);

                            if ($result):
                                if(mysqli_num_rows($result)>0):
                                    while($product = mysqli_fetch_assoc($result)): ?>
                                        <div class="fprod" onclick="window.location.href='LS_productpage.php?id=<?php echo $product['PRODUCT_ID']; ?>';"> <!--Item1 -->
                                            <img src="../img/products/<?php echo $product['PRODUCT_IMG'] ?>" alt="">
                                            <div class="fprod-desc">
                                                <span>₱ <?php echo $product['PRICE']; ?></span>
                                                <h5><?php echo $product['NAME']; ?></h5>
                                            </div>
                                            <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
                                        </div> 
                                    <?php endwhile;
                                endif;
                            endif;   
                        ?>
                        </div> <!-- container end -->
                    </section>
                    <section id="necklace" class="tab-panel">
                    <div class="container">  <!--Enter listings here -->
                        <?php
                            $query = 'SELECT * FROM product WHERE CATEGORY_ID=1 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
                            $result = mysqli_query($db, $query);

                            if ($result):
                                if(mysqli_num_rows($result)>0):
                                    while($product = mysqli_fetch_assoc($result)): ?>
                                        <div class="fprod" onclick="window.location.href='LS_productpage.php?id=<?php echo $product['PRODUCT_ID']; ?>';"> <!--Item1 -->
                                            <img src="../img/products/<?php echo $product['PRODUCT_IMG'] ?>" alt="">
                                            <div class="fprod-desc">
                                                <span>₱ <?php echo $product['PRICE']; ?></span>
                                                <h5><?php echo $product['NAME']; ?></h5>
                                            </div>
                                            <a href="#"><span class="add"><i class="fas fa-cart-plus" style="color: #521562;"></i></span></a>
                                        </div> 
                                    <?php endwhile;
                                endif;
                            endif;   
                        ?>
                        </div> <!-- container end -->
                    </section>
                </div>
            </div>
    </section>

    <!--Footer-->
    <?php include('../includes/ls-footer.php'); ?>
</body>
</html>