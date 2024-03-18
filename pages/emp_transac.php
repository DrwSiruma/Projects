<?php
require('session.php');
include'../includes/connection.php';
?>
            <?php
              $fname = $_POST['firstname'];
              $lname = $_POST['lastname'];
              $gen = $_POST['gender'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              $jobb = $_POST['jobs'];
              $hdate = $_POST['hireddate'];
              $prov = $_POST['province'];
              $cit = $_POST['city'];
              $AAA = $_SESSION['MEMBER_ID'];
              $efn = $_SESSION['FIRST_NAME'];
              $activity = $_SESSION['FIRST_NAME'] . 'Added' . ' ' . $_POST['firstname'] . ' ' . $_POST['lastname'] . ' ' . 'into the Employee list';
              $dataTime = date("Y-m-d H:i:s");

              mysqli_query($db,"INSERT INTO activity_log(employee_id, employee_name, activity, datetime)VALUES('$AAA','$efn','$activity','$dataTime')");
              mysqli_query($db,"INSERT INTO location
                              (LOCATION_ID, PROVINCE, CITY)
                              VALUES (Null,'$prov','$cit')");
              mysqli_query($db,"INSERT INTO employee
                              (EMPLOYEE_ID, FIRST_NAME, LAST_NAME,GENDER, EMAIL, PHONE_NUMBER, JOB_ID, HIRED_DATE, LOCATION_ID)
                              VALUES (Null,'{$fname}','{$lname}','{$gen}','{$email}','{$phone}','{$jobb}','{$hdate}',(SELECT MAX(LOCATION_ID) FROM location))");
              header('location:employee.php');
            ?>