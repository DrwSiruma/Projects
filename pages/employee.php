<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

                $query = 'SELECT ID, t.TYPE
                          FROM users u
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $Aa = $row['TYPE'];
                   
if ($Aa=='User'){
           
             ?>    <script type="text/javascript">
                      //then it will be redirected
                      alert("Restricted Page! You will be redirected to POS");
                      window.location = "pos.php";
                  </script>
             <?php   }
                         
           
}   
            ?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">Employee&nbsp;<a  href="#" data-toggle="modal" data-target="#employeeModal" type="button" class="btn btn-dark btn-sm" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                  <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th style="text-align:center;">Action</th>
                        </tr>
                     </thead>
                    <tbody>
                    <?php                  
                        $query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, j.JOB_TITLE, Status FROM employee e JOIN job j ON e.JOB_ID=j.JOB_ID';
                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>'. $row['FIRST_NAME'].'</td>';
                        echo '<td>'. $row['LAST_NAME'].'</td>';
                        echo '<td>'. $row['JOB_TITLE'].'</td>';

                        if($row['Status'] == 1){
                          echo '<td><div class="badge badge-success">Active</div></td>';
                        }
                        else{
                          echo '<td><div class="badge badge-warning">Inactive</div></td>';
                        }
                        

                      echo '<td align="right"> <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-dark" href="emp_searchfrm.php?action=edit & id='.$row['EMPLOYEE_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Details</a>
                            <div class="btn-group">
                              <a type="button" class="btn btn-primary bg-dark dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                              ... <span class="caret"></span></a>
                            <ul class="dropdown-menu text-center" role="menu">
                                <li>
                                  <a type="button" class="btn btn-dark btn-block" style="border-radius: 0px;" href="emp_edit.php?action=edit & id='.$row['EMPLOYEE_ID']. '">
                                    <i class="fas fa-fw fa-edit"></i> Edit
                                  </a>
                                </li>';
                                if($row['Status'] == 1){
                                  echo '
                                  <li>
                                    <a type="button" class="btn btn-dark btn-block" style="border-radius: 0px;" href="emp_archive.php?action=archive & id='.$row['EMPLOYEE_ID']. '">
                                      <i class="fas fa-fw fa-archive"></i> Archive
                                    </a>
                                  </li>';
                                } else {
                                  echo '
                                  <li>
                                    <a type="button" class="btn btn-dark btn-block" style="border-radius: 0px;" href="emp_retrieve.php?action=retrieve & id='.$row['EMPLOYEE_ID']. '">
                                      <i class="fas fa-fw fa-archive"></i> Retrieve
                                    </a>
                                  </li>';
                                }
                            echo '
                            </ul>
                            </div>
                          </div> </td>';
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
?>