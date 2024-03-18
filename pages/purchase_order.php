<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?><?php 

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
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">Purchase Order&nbsp;<a  href="#" data-toggle="modal" data-target="#poModal" type="button" class="btn btn-dark btn-sm" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Date Oredered</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Supplier</th>
                        <th>Posted</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php                  
                      $query = 'SELECT * FROM purchase_order';
                      $result = mysqli_query($db, $query) or die (mysqli_error($db));
        
                      while ($row = mysqli_fetch_assoc($result)) {
                      
                      if($row['category']=='0'){
                        $categ="Shoes";
                      } elseif($row['category']=='1'){
                        $categ="Crocs";
                      } elseif($row['category']=='6'){
                        $categ="Slippers";
                      } elseif($row['category']=='7'){
                        $categ="Socks";
                      }

                      echo '<tr>';
                      echo '<td>'. $row['date_ordered'].'</td>';
                      echo '<td>'. $row['itemcode'].'</td>';
                      echo '<td>'. $row['itemname'].'</td>';
                      echo '<td>'. $categ. '</td>';
                      echo '<td>'. $row['qty'].'</td>';
                      echo '<td>'. number_format($row['uprice'],2).'</td>';
                      echo '<td>'. number_format($row['tprice'],2).'</td>';
                      echo '<td>'. $row['supplier'].'</td>';
                      echo '<td>'. $row['posted'].'</td>';
                      echo '</tr> ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

  <!-- PO Modal-->
  <div class="modal fade" id="poModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Purchase Order</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="po_transac.php?action=add">
            <div class="form-group">
              <input class="form-control" placeholder="Supplier" name="supplier" type="text" list="suppliers" required>
              <datalist id="suppliers">
                <?php 
                  $check = $db-> query("SELECT COMPANY_NAME FROM supplier ORDER BY COMPANY_NAME");

                  while ($rows = $check ->fetch_assoc()){ 
                ?>
                    <option value="<?php echo $rows['COMPANY_NAME'] ?>" />
                <?php
                  }
                ?>
              </datalist>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Item Name" name="itemname" type="text" list="itemname" required>
              <datalist id="itemname">
                <?php 
                  $check = $db-> query("SELECT NAME FROM product ORDER BY NAME");

                  while ($rows = $check ->fetch_assoc()){ 
                ?>
                    <option value="<?php echo $rows['NAME'] ?>" />
                <?php
                  }
                ?>
              </datalist>
            </div>
            <div class="form-group">
              <select class="form-control" name="category" required>
                <option value="Category" select hidden>Category</option>
                <?php 
                  $categ_qry = $db-> query("SELECT * FROM category");

                  while ($categ_row = $categ_qry ->fetch_assoc()){ 
                ?>
                    <option value="<?php echo $categ_row['CATEGORY_ID']; ?>"><?php echo $categ_row['CNAME']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Quantity" name="qty" type="number" required>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Unit Price" name="uprice" type="number" required>
            </div>
            <div class="form-group">
              <input class="form-control" type="date" name="date" required>
            </div>
            <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>
<?php
include'../includes/footer.php';
?>