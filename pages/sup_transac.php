<?php
require('session.php');
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $name = $_POST['companyname'];
              $prov = $_POST['province'];
              $cit = $_POST['city'];
              $phone = $_POST['phonenumber'];
              $AAA = $_SESSION['MEMBER_ID'];
              $efn = $_SESSION['FULL_NAME'];
              $activity = $_SESSION['FULL_NAME'] . 'Added' . ' ' . $_POST['companyname'] . ' ' . 'into the Product list';
              $dataTime = date("Y-m-d H:i:s");

              mysqli_query($db,"INSERT INTO activity_log(employee_id, employee_name, activity, datetime)VALUES('$AAA','$efn','$activity','$dataTime')");
        
              switch($_GET['action']){
                case 'add':     
                    $query = "INSERT INTO sup_location
                              (LOCATION_ID, PROVINCE, CITY)
                              VALUES (Null,'{$prov}','{$cit}')";
                    mysqli_query($db,$query)or die ('Error in updating location in Database');

                    $query2 = "INSERT INTO supplier
                              (SUPPLIER_ID, COMPANY_NAME, LOCATION_ID, PHONE_NUMBER)
                              VALUES (Null,'{$name}',(SELECT MAX(LOCATION_ID) FROM sup_location),'".$phone."')";
                    mysqli_query($db,$query2)or die ('Error in updating supplier in Database');
                break;
              }
            ?>
              <script type="text/javascript">window.location = "supplier.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>