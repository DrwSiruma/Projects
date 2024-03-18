<?php
require('../includes/connection.php');
session_start();

$AAA = $_SESSION['MEMBER_ID'];
$efn = $_SESSION['FULL_NAME'];
$activity = $_SESSION['FULL_NAME'] . 'logged out';
$dataTime = date("Y-m-d H:i:s");

$activityqry = "INSERT INTO activity_log(employee_id, employee_name, activity, datetime)VALUES('$AAA','$efn','$activity','$dataTime')";
$activity_log = $db->query($activityqry);
// 2. Unset all the session variables
unset($_SESSION['MEMBER_ID']);
unset($_SESSION['USERNAME']);
unset($_SESSION['FULL_NAME']);
unset($_SESSION['EMAIL']);
unset($_SESSION['PHONE_NUMBER']);
unset($_SESSION['TYPE']);
unset($_SESSION['pointofsale']);
?>
<script type="text/javascript">
    window.location = "LS_home.php";
</script>