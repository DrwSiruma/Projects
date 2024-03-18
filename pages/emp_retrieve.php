<?php
include'../includes/connection.php';

  $active = '1';
  $empId = $_GET['id'];

  $qry = "UPDATE employee set Status='$active' WHERE EMPLOYEE_ID ='$empId'";
  $res = mysqli_query($db, $qry) or die(mysqli_error($db));
?>

<script type="text/javascript">
	alert("You Retrieve Employee Successfully.");
	window.location = "employee.php";
</script>