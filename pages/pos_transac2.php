<?php
include'../includes/connection.php';
session_start();
switch($_GET['action']){
  case 'add':
    unset($_SESSION['pointofsale']);
    ?>
    <script type="text/javascript">
      alert("Success.");
      window.location = "pos.php";
    </script>
    <?php
  break;
}
?>