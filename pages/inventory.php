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
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
            ?>
            
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">Inventory</h4>
            </div>
            <div class="card-body">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#" data-target="#shoes" data-toggle="tab">SHOES</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-target="#necklace" data-toggle="tab">NECKLACE</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-target="#slippers" data-toggle="tab">SLIPPERS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-target="#shirts" data-toggle="tab">SHIRTS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" data-target="#critical" data-toggle="tab">Critical Level</a>
                </li>
              </ul>

              <!-- Tab panes -->
                <div class="tab-content">
                  <!-- 1ST TAB -->
                  <div class="tab-pane fade in mt-2 show active" id="shoes">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="shoes_table" width="100%" cellspacing="0"> 
                        <thead>
                            <tr>
                              <th>Product Code</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Category</th>
                              <th>Date Stock In</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php                  
                              $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE p.CATEGORY_ID=0 AND c.CATEGORY_ID=0 GROUP BY PRODUCT_CODE';
                              $result = mysqli_query($db, $query) or die (mysqli_error($db));
                              
                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<tr>';
                                if($row['QTY_STOCK'] <= '20'){
                                  if($row['QTY_STOCK'] <= '10'){
                                    echo '<td style="color:red;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:red;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:red;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                  else{
                                    echo '<td style="color:orange;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:orange;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:orange;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                } else{
                                  echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                                  echo '<td>'. $row['NAME'].'</td>';
                                  echo '<td>'. $row['QTY_STOCK'].'</td>';
                                  echo '<td>'. $row['CNAME'].'</td>';
                                  echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                                }
                                echo '</tr>';
                                                
                              }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- 2ND TAB -->
                  <div class="tab-pane fade in mt-2" id="necklace">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="crocs_table" width="100%" cellspacing="0"> 
                        <thead>
                            <tr>
                              <th>Product Code</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Category</th>
                              <th>Date Stock In</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php                  
                              $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE p.CATEGORY_ID=1 AND c.CATEGORY_ID=1 GROUP BY PRODUCT_CODE';
                              $result = mysqli_query($db, $query) or die (mysqli_error($db));
                              
                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<tr>';
                                if($row['QTY_STOCK'] <= '20'){
                                  if($row['QTY_STOCK'] <= '10'){
                                    echo '<td style="color:red;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:red;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:red;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                  else{
                                    echo '<td style="color:orange;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:orange;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:orange;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                } else{
                                  echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                                  echo '<td>'. $row['NAME'].'</td>';
                                  echo '<td>'. $row['QTY_STOCK'].'</td>';
                                  echo '<td>'. $row['CNAME'].'</td>';
                                  echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                                }
                                echo '</tr>';
                                                
                              }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- 3RD TAB -->
                  <div class="tab-pane fade in mt-2" id="slippers">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="slippers_table" width="100%" cellspacing="0"> 
                        <thead>
                            <tr>
                              <th>Product Code</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Category</th>
                              <th>Date Stock In</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php                  
                              $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE p.CATEGORY_ID=6 AND c.CATEGORY_ID=6 GROUP BY PRODUCT_CODE';
                              $result = mysqli_query($db, $query) or die (mysqli_error($db));
                              
                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<tr>';
                                if($row['QTY_STOCK'] <= '20'){
                                  if($row['QTY_STOCK'] <= '10'){
                                    echo '<td style="color:red;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:red;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:red;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                  else{
                                    echo '<td style="color:orange;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:orange;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:orange;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                } else{
                                  echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                                  echo '<td>'. $row['NAME'].'</td>';
                                  echo '<td>'. $row['QTY_STOCK'].'</td>';
                                  echo '<td>'. $row['CNAME'].'</td>';
                                  echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                                }
                                echo '</tr>';
                                                
                              }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- 4TH TAB -->
                  <div class="tab-pane fade in mt-2" id="shirts">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="critical_table" width="100%" cellspacing="0"> 
                        <thead>
                            <tr>
                              <th>Product Code</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Category</th>
                              <th>Date Stock In</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php                  
                              $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE p.CATEGORY_ID=8 AND c.CATEGORY_ID=8 GROUP BY PRODUCT_CODE';
                              $result = mysqli_query($db, $query) or die (mysqli_error($db));
                              
                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<tr>';
                                if($row['QTY_STOCK'] <= '20'){
                                  if($row['QTY_STOCK'] <= '10'){
                                    echo '<td style="color:red;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:red;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:red;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                  else{
                                    echo '<td style="color:orange;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:orange;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:orange;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                } else{
                                  echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                                  echo '<td>'. $row['NAME'].'</td>';
                                  echo '<td>'. $row['QTY_STOCK'].'</td>';
                                  echo '<td>'. $row['CNAME'].'</td>';
                                  echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                                }
                                echo '</tr>';
                                                
                              }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- 5TH TAB -->
                  <div class="tab-pane fade in mt-2" id="critical">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="critical_table" width="100%" cellspacing="0"> 
                        <thead>
                            <tr>
                              <th>Product Code</th>
                              <th>Name</th>
                              <th>Quantity</th>
                              <th>Category</th>
                              <th>Date Stock In</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php                  
                              $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID WHERE QTY_STOCK<=10 GROUP BY PRODUCT_CODE';
                              $result = mysqli_query($db, $query) or die (mysqli_error($db));
                              
                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<tr>';
                                if($row['QTY_STOCK'] <= '20'){
                                  if($row['QTY_STOCK'] <= '10'){
                                    echo '<td style="color:red;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:red;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:red;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:red;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                  else{
                                    echo '<td style="color:orange;">'. $row['PRODUCT_CODE'].'</td>';
                                    echo '<td style="color:orange;">'. $row['NAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['QTY_STOCK'].'</td>';
                                    echo '<td style="color:orange;">'. $row['CNAME'].'</td>';
                                    echo '<td style="color:orange;">'. $row['DATE_STOCK_IN'].'</td>';
                                  }
                                } else{
                                  echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                                  echo '<td>'. $row['NAME'].'</td>';
                                  echo '<td>'. $row['QTY_STOCK'].'</td>';
                                  echo '<td>'. $row['CNAME'].'</td>';
                                  echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
                                }
                                echo '</tr>';
                                                
                              }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              
            </div>
          </div>
<?php
include'../includes/footer.php';
?>