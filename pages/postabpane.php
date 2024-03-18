
<!-- Tab panes -->
<div class="tab-content">
  <!-- 1ST TAB -->
  <div class="tab-pane fade in mt-2 show active" id="shoes">
    <div class="row">
      <?php  $query = 'SELECT * FROM product WHERE CATEGORY_ID=0 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
        $result = mysqli_query($db, $query);

        if ($result):
          if(mysqli_num_rows($result)>0):
            while($product = mysqli_fetch_assoc($result)):
              //print_r($product);
              ?>
              <div class="col-sm-4 col-md-2" >
                <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                  <div class="products">
                    <div class="d-flex flex-column align-items-center text-center p-1 position-relative">
                      <img src="../img/products/<?php echo $product['PRODUCT_IMG']; ?>" style="width: 150px;" />
                    </div>
                    <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                    <h6>Stock: <?php echo $product['QTY_STOCK']; ?></h6>
                    <h6>₱ <?php echo $product['PRICE']; ?></h6>
                    <div class="row">
                      <div class="col-sm-7">
                        <input type="text" name="quantity" class="form-control" value="1" />
                        <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                        <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                      </div>
                      <div class="col-sm-5">
                        <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Add" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php endwhile; 
          endif;
        endif; 
      ?>
    </div>
  </div>
  <!-- 2ND TAB -->
  <div class="tab-pane fade in mt-2" id="necklace">
    <div class="row">
      <?php  $query = 'SELECT * FROM product WHERE CATEGORY_ID=1 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
        $result = mysqli_query($db, $query);

        if ($result):
          if(mysqli_num_rows($result)>0):
            while($product = mysqli_fetch_assoc($result)):
              //print_r($product);
              ?>
              <div class="col-sm-4 col-md-2" >
                <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                  <div class="products">
                    <div class="d-flex flex-column align-items-center text-center p-1 position-relative">
                      <img src="../img/products/<?php echo $product['PRODUCT_IMG']; ?>" style="width: 150px;" />
                    </div>
                    <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                    <h6>Stock: <?php echo $product['QTY_STOCK']; ?></h6>
                    <h6>₱ <?php echo $product['PRICE']; ?></h6>
                    <div class="row">
                      <div class="col-sm-7">
                        <input type="text" name="quantity" class="form-control" value="1" />
                        <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                        <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                      </div>
                      <div class="col-sm-5">
                        <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Add" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php endwhile;
          endif;
        endif;
      ?>
    </div>
  </div>
  <!-- 3rd TAB -->
  <div class="tab-pane fade in mt-2" id="slippers">
    <div class="row">
      <?php  $query = 'SELECT * FROM product WHERE CATEGORY_ID=6 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
        $result = mysqli_query($db, $query);

        if ($result):
          if(mysqli_num_rows($result)>0):
            while($product = mysqli_fetch_assoc($result)):
              //print_r($product);
              ?>
              <div class="col-sm-4 col-md-2" >
                <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                  <div class="products">
                    <div class="d-flex flex-column align-items-center text-center p-1 position-relative">
                      <img src="../img/products/<?php echo $product['PRODUCT_IMG']; ?>" style="width: 150px;" />
                    </div>
                    <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                    <h6>Stock: <?php echo $product['QTY_STOCK']; ?></h6>
                    <h6>₱ <?php echo $product['PRICE']; ?></h6>
                    <div class="row">
                      <div class="col-sm-7">
                        <input type="text" name="quantity" class="form-control" value="1" />
                        <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                        <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                      </div>
                      <div class="col-sm-5">
                        <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Add" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php endwhile;
          endif;
        endif;   
      ?>
    </div>
  </div>
  <!-- 4th TAB -->
  <div class="tab-pane fade in mt-2" id="shirts">
    <div class="row">
      <?php  $query = 'SELECT * FROM product WHERE CATEGORY_ID=8 AND QTY_STOCK > 0 GROUP BY PRODUCT_CODE ORDER by PRODUCT_CODE ASC';
        $result = mysqli_query($db, $query);

        if ($result):
          if(mysqli_num_rows($result)>0):
            while($product = mysqli_fetch_assoc($result)):
              //print_r($product);
              ?>
              <div class="col-sm-4 col-md-2" >
                <form method="post" action="pos.php?action=add&id=<?php echo $product['PRODUCT_ID']; ?>">
                  <div class="products">
                    <div class="d-flex flex-column align-items-center text-center p-1 position-relative">
                      <img src="../img/products/<?php echo $product['PRODUCT_IMG']; ?>" style="width: 150px;" />
                    </div>
                    <h6 class="text-info"><?php echo $product['NAME']; ?></h6>
                    <h6>Stock: <?php echo $product['QTY_STOCK']; ?></h6>
                    <h6>₱ <?php echo $product['PRICE']; ?></h6>
                    <div class="row">
                      <div class="col-sm-7">
                        <input type="text" name="quantity" class="form-control" value="1" />
                        <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>" />
                        <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>" />
                      </div>
                      <div class="col-sm-5">
                        <input type="submit" name="addpos" style="margin-top:5px;" class="btn btn-info" value="Add" />
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            <?php endwhile;
          endif;
        endif;   
      ?>
    </div>
  </div>
</div>