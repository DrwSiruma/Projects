<?php
include'../includes/connection.php';

  $inactive = '0';
  $empId = $_GET['id'];

  $qry = "UPDATE employee set Status='$inactive' WHERE EMPLOYEE_ID ='$empId'";
  $res = mysqli_query($db, $qry) or die(mysqli_error($db));
?>

<script type="text/javascript">
	alert("You've Archive Employee Successfully.");
	window.location = "employee.php";
</script>