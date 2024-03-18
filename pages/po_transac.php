<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT id, ls_type
                          FROM ls_users
                          WHERE id = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['ls_type'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
}   
            ?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $supplier = $_POST['supplier'];
              $itemname = $_POST['itemname'];
              $category = $_POST['category'];
              $qty = $_POST['qty'];
              $uprice = $_POST['uprice'];
              $tprice = ($uprice * $qty);
              $date_ordered = $_POST['date'];
              $AAA = $_SESSION['MEMBER_ID'];
              $efn = $_SESSION['FULL_NAME'];
              $activity = $_SESSION['FULL_NAME'] . ' Added new purchase order';
              $dataTime = date("Y-m-d H:i:s");

              switch($_GET['action']){
                case 'add':
                  $selectqry = 'SELECT * FROM product WHERE NAME="'.$itemname.'" AND CATEGORY_ID="'.$category.'"';
                  $selected = mysqli_query($db,$selectqry)or die ('Error in updating Database');

                  if(mysqli_num_rows($selected)>0){
                    $selprod = mysqli_fetch_assoc($selected);
                    $itemcode = $selprod['PRODUCT_CODE'];

                    $query = mysqli_query($db, "INSERT INTO purchase_order
                    (id, supplier, itemcode, itemname, category, qty, uprice, tprice, date_ordered)
                    VALUES (Null,'{$supplier}','{$itemcode}','{$itemname}','{$category}','{$qty}','{$uprice}','{$tprice}','{$date_ordered}')");

                    if($query){
                      mysqli_query($db,"INSERT INTO activity_log(employee_id, employee_name, activity, datetime)VALUES('$AAA','$efn','$activity','$dataTime')");
                      echo "<script>alert('Purchase added!');</script>";
                    }
                  }
                  else{
                    echo "<script>alert('Product is not identified!');</script>";
                  }
                    
                break;
              }
            ?>
              <script type="text/javascript">
                window.location = "purchase_order.php";
              </script>
          </div>

<?php
include'../includes/footer.php';
?>