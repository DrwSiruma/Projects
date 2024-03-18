<?php
include'../includes/connection.php';
include'../includes/sidebar.php';

$query = 'SELECT ID, t.TYPE FROM users u JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
$result = mysqli_query($db, $query) or die (mysqli_error($db));
      
while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];
                   
    if ($Aa=='User'){
?>    <script type="text/javascript">
        //then it will be redirected
        alert("Restricted Page! You will be redirected to POS");
        window.location = "pos.php";
      </script>
<?php
    }
}   ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-dark">Activity Log</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Action Mode</th>
                     <th>Date & Time</th>
                    </tr>
               </thead>
               <tbody>
               <?php                  
                    $userid = $_SESSION['MEMBER_ID'];
                    $query = "SELECT * FROM activity_log WHERE employee_id = '$userid'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                    while ($row = mysqli_fetch_assoc($result)) {
                                 
                        echo '<tr>';
                        echo '<td>'. $row['activity'].'</td>';
                        echo '<td>'. $row['datetime'].'</td>';
                        echo '</tr>';
                      
                    }
                ?> 
               </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Table Script -->
<script>        
  $(document).ready( function () {
    var agenttable = $('#dataTable').DataTable({
      searching: true,
      paging: true,
      info: true,
      odering: false;
      lengthChange: true,
    });
  });
</script>

<?php
include'../includes/footer.php';
?>