<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
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
        <!-- ADMIN TABLE -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">Admin Account(s)</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                   <tr>
                       <th>Name</th>
                       <th>Username</th>
                       <th>Type</th>
                       <th>Action</th>
                   </tr>
               </thead>
          <tbody>
<?php                  
    $query = 'SELECT id, ls_uname, ls_fname, ls_type
              FROM ls_users
              WHERE ls_type="Admin"';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['ls_fname'].'</td>';
                echo '<td>'. $row['ls_uname'].'</td>';
                echo '<td>'. $row['ls_type'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-dark bg-dark" href="us_searchfrm.php?action=edit&id='.$row['id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                          </div></td>';
                echo '</tr> ';
                        }
?>         
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>





         <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">User Accounts&nbsp;
            </div>
            <div class="card-body">
            <div class="table-responsive">
           <table class="table table-bordered" id="user_table" width="100%" cellspacing="0">
               <thead>
                   <tr>
                       <th>Name</th>
                       <th>Username</th>
                       <th>Type</th>
                       <th>Action</th>
                   </tr>
               </thead>
          <tbody>
<?php                  
    $query = 'SELECT id, ls_uname, ls_fname, ls_type
              FROM ls_users
              WHERE ls_type="User"';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['ls_fname'].'</td>';
                echo '<td>'. $row['ls_uname'].'</td>';
                echo '<td>'. $row['ls_type'].'</td>';
                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-dark bg-dark" href="us_searchfrm.php?action=edit&id='.$row['id'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                          </div></td>';
                echo '</tr> ';
                        }
?>         
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';