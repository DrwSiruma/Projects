<?php
require('session.php');
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $uniqid = uniqid();
              $rand_start = rand(1,5);
              $pc = strtoupper(substr($uniqid,$rand_start,8));
              // $pc = $_POST['prodcode'];
              $filename = uniqid() . "_" . $_FILES['image']['name'];
              $name = $_POST['name'];
              $desc = $_POST['description'];
              $qty = $_POST['quantity'];
              $oh = $_POST['quantity'];
              $pr = $_POST['price']; 
              $cat = $_POST['category'];
              $dats = $_POST['datestock']; 
              $AAA = $_SESSION['MEMBER_ID'];
              $efn = $_SESSION['FULL_NAME'];
              $activity = $_SESSION['FULL_NAME'] . 'Added' . ' ' . $_POST['name'] . ' ' . 'into the Product list';
              $dataTime = date("Y-m-d H:i:s");
              $upload_dir = "../img/products/";

              $selectSql = "SELECT * FROM `product` WHERE `NAME` = '$name' AND `CATEGORY_ID` = '$cat'";
              $selectResult = mysqli_query($db, $selectSql);
              $rows = mysqli_num_rows($selectResult);

                  if($rows > 0){

                    echo '<script>alert("FAILED: Product is already added!");</script>';

                  } elseif($rows <= 0){

                    $target_file = $upload_dir . $filename;

                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                      $query = "INSERT INTO product
                              (PRODUCT_IMG, PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, ON_HAND, PRICE, CATEGORY_ID, DATE_STOCK_IN)
                              VALUES ('$filename',Null,'$pc','$name','$desc','$qty','$oh','$pr','$cat','$dats')";
                      mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
                      mysqli_query($db,"INSERT INTO activity_log(employee_id, employee_name, activity, datetime)VALUES('$AAA','$efn','$activity','$dataTime')");
                      echo '<script>alert("Product Added Successfully");</script>';
                    } else {
                      echo '<script>alert("File not uploaded");</script>';
                    }

                  } else{
                    echo '<script>alert("Failed");</script>';
                  }
                    
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>