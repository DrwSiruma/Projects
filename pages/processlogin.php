<?php

require('../includes/connection.php');
require('session.php');
if (isset($_POST['ls_login'])) {


  $email = trim($_POST['ls_email']);
  $upass = trim($_POST['ls_pass']);
  $h_upass = sha1($upass);
if ($upass == ''){
     ?>    <script type="text/javascript">
                alert("Password is missing!");
                window.location = "LS_login.php";
                </script>
        <?php
}else{
//create some sql statement             
        $sql = "SELECT id,ls_uname,ls_fname,ls_email,ls_password,ls_phone,ls_type
        FROM  `ls_users`
        WHERE  `ls_email` ='" . $email . "' AND  `ls_password` =  '" . $h_upass . "'";
        $result = $db->query($sql);

        if ($result){
        //get the number of results based n the sql statement
        //check the number of result, if equal to one   
        //IF theres a result
            if ( $result->num_rows > 0) {
                //store the result to a array and passed to variable found_user
                $found_user  = mysqli_fetch_array($result);
                //fill the result to session variable
                $_SESSION['MEMBER_ID']  = $found_user['id']; 
                $_SESSION['USERNAME']  =  $found_user['ls_uname']; 
                $_SESSION['FULL_NAME'] = $found_user['ls_fname']; 
                $_SESSION['EMAIL']  =  $found_user['ls_email'];
                $_SESSION['PHONE_NUMBER']  =  $found_user['ls_phone']; 
                $_SESSION['TYPE']  =  $found_user['ls_type'];
                $AAA = $_SESSION['MEMBER_ID'];
                $efn = $_SESSION['FULL_NAME'];
                $activity = $_SESSION['FULL_NAME'] . 'logged in';
                $dataTime = date("Y-m-d H:i:s");

        //this part is the verification if admin or user ka
        if ($_SESSION['TYPE']=='Admin'){
          $activityqry = "INSERT INTO activity_log(employee_id, employee_name, activity, datetime)VALUES('$AAA','$efn','$activity','$dataTime')";
          $activity_log = $db->query($activityqry);
          if($activity_log){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert("Welcome <?php echo  $_SESSION['FULL_NAME']; ?>!");
                      window.location = "index.php";

                  </script>
             <?php        
          }
        }elseif ($_SESSION['TYPE']=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected to index.php
                      alert("Welcome <?php echo  $_SESSION['FULL_NAME']; ?>!");
                      window.location = "pos.php";
                  </script>
             <?php        
           
        }
            } else {
            //IF theres no result
              ?>
                <script type="text/javascript">
                  alert("Username or Password Not Registered! Contact Your administrator.");
                  window.location = "LS_login.php";
                </script>
              <?php

            }

         } else {
                 # code...
        echo "Error: " . $sql . "<br>" . $db->error;
        }
        
    }       
} 
 $db->close();
?>