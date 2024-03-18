<?php
include'../includes/connection.php';
include'../includes/topp.php';
?>

<?php
$query = 'SELECT T.*, C.FIRST_NAME, C.LAST_NAME, C.PHONE_NUMBER, tt.EMPLOYEE, tt.ROLE
              FROM transaction T
              JOIN customer C ON T.`CUST_ID`=C.`CUST_ID`
              JOIN transaction_details tt ON tt.`TRANS_D_ID`=T.`TRANS_D_ID`
              WHERE T.`TRANS_D_ID` ='.$_GET['id'];
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($row = mysqli_fetch_assoc($result)) {
          $fname = $row['FIRST_NAME'];
          $lname = $row['LAST_NAME'];
          $pn = $row['PHONE_NUMBER'];
          $date = $row['DATE'];
          $tid = $row['TRANS_D_ID'];
          $cash = $row['CASH'];
          $sub = $row['SUBTOTAL'];
          
          $grand = $row['GRANDTOTAL'];
          $role = $row['EMPLOYEE'];
          $roles = $row['ROLE'];
        }
?>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="form-group row text-left mb-0">
            <div class="col-sm-9">
                <h5 class="font-weight-bold">
                    Receipt
                </h5>
            </div>
            <div class="col-sm-3 py-1">
                <h6>
                    Date: <?php echo $date; ?>
                </h6>
            </div>
        </div>
        <hr>
        <div class="form-group row text-left mb-0 py-2">
            <div class="col-sm-4 py-1">
                <h6 class="font-weight-bold">
                    <?php echo $fname; ?> <?php echo $lname; ?>
                </h6>
                <h6>
                    Transaction #<?php echo $tid; ?>
                </h6>
                <!-- <h6>
                    Phone: <?php echo $pn; ?>
                </h6> -->
            </div>
            <div class="col-sm-4 py-1"></div>
            <div class="col-sm-4 py-1">
                <!-- <h6>
                    Transaction #<?php echo $tid; ?>
                </h6> -->
                <h6 class="font-weight-bold">
                    Encoder: <?php echo $role; ?>
                </h6>
                <h6>
                    <?php echo $roles; ?>
                </h6>
            </div>
        </div>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Products</th>
                <th width="8%">Qty</th>
                <th width="20%">Price</th>
                <th width="20%">Subtotal</th>
              </tr>
            </thead>
            <tbody>
                <?php  
                    $query = 'SELECT *
                     FROM transaction_details
                     WHERE TRANS_D_ID ='.$tid;
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                    while ($row = mysqli_fetch_assoc($result)) {
                        $Sub =  $row['QTY'] * $row['PRICE'];
                        echo '<tr>';
                        echo '<td>'. $row['PRODUCTS'].'</td>';
                        echo '<td>'. $row['QTY'].'</td>';
                        echo '<td>'. number_format($row['PRICE'], 2).'</td>';
                        echo '<td>'. number_format($Sub, 2).'</td>';
                        echo '</tr> ';
                    }
                ?>
            </tbody>
        </table>
        <div class="form-group row text-left mb-0 py-2">
            <div class="col-sm-4 py-1"></div>
            <div class="col-sm-3 py-1"></div>
            <div class="col-sm-4 py-1">
                <h4>
                    Cash Amount: ₱ <?php echo number_format($cash, 2); ?>
                </h4>
                <table width="100%">
                    <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">₱ <?php echo number_format($sub, 2); ?></td>
                    </tr>
                    
                    <tr>
                      <td class="font-weight-bold">Total</td>
                      <td class="font-weight-bold text-right text-primary">₱ <?php echo number_format($grand, 2); ?></td>
                    </tr>

                    <tr>
                      <td class="font-weight-bold">Change</td>
                      <td class="font-weight-bold text-right text-primary">₱ <?php echo number_format($cash-$grand, 2); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="form-group row text-left mb-0 py-2">
            <div class="col-sm-4 py-1"></div>
            <div class="col-sm-3 py-1"></div>
            <div class="col-sm-4 py-1">
                <table width="100%">

                    <tr>
                        <td><a href="pos.php" class="btn btn-block btn-primary">FINISH</a></td>
                        <td><button type="button" class="btn btn-block btn-success" onclick="window.print()">PRINT</button></td>
                    </tr>

                </table>
            </div>
            <div class="col-sm-1 py-1"></div>
        </div>
    </div>
</div>

<?php
include'../includes/footer.php';
?>