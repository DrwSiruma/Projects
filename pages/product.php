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
$csql = "SELECT * FROM category";
$cresult = mysqli_query($db, $csql) or die ("Bad SQL: $csql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($cresult)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">Product&nbsp;<a  href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-dark btn-sm" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                      <th>Image</th>
                      <th>Product Code</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
    $query = 'SELECT PRODUCT_ID, PRODUCT_IMG, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p join category c on p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
        $presult = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($presult)) {
                                 
                echo '<tr>';
                echo '<td align="center"><img src="../img/products/'. $row['PRODUCT_IMG'] .'" style="width:80px;"></td>';
                echo '<td>'. $row['PRODUCT_CODE'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. number_format($row['PRICE'],2).'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                      
                
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
<!-- Product Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" method="post" action="pro_transac.php?action=add" enctype="multipart/form-data">
         <div class="form-group">
           <input type="file" class="form-control" id="imageFile" name="image" accept=".jpg, .jpeg, .png">
         </div>
         <div class="form-group">
           <input class="form-control" placeholder="Product Name" name="name" required>
         </div>
         <div class="form-group">
           <textarea rows="5" cols="50" class="form-control" placeholder="Description" name="description" required></textarea>
         </div>
         <div class="form-group">
           <input type="number"  min="1" max="999999999" class="form-control" placeholder="Quantity" name="quantity" required>
         </div>
         <div class="form-group">
           <input type="number"  min="1" max="9999999999" class="form-control" placeholder="Price" name="price" required>
         </div>
         <div class="form-group">
           <?php
             echo $aaa;
           ?>
         </div>
         <div class="form-group">
           <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date Stock In" name="datestock" required>
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