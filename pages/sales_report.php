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
            <!-- <link href="../vendor/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
            <script src="../vendor/jquery/jquery-3.5.1.js" ></script>
            <script src="../vendor/datatables-plugins/dataTables.buttons.min.js" ></script>
            <script src="../vendor/jszip.min.js"></script>
            <script src="../vendor/pdfmake.min.js"></script>
            <script src="../vendor/vfs_fonts.js"></script>
            <script src="../vendor/buttons.html5.min.js"></script>
            <script src="../vendor/jquery/jquery.min.js"></script>
            <script src="../vendor/jquery/jquerys.min.js"></script> -->

            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-dark">Sales Report</h4>
            </div>
            
            <div class="card-body">
              <form action="" method="GET">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>From Date</label>
                      <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label>To Date</label>
                      <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Click to Filter</label> <br>
                      <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <label>&nbsp;</label><br>
                    <p class="lead text-right">
                      <button type="button" id="pdf" onclick="javascript:demoFromHTML(salesrep);" class="btn btn-danger"><i class="fas fa-download"></i>&nbsp;PDF</button></p>
                  </div>
                </div>
              </form>

              <!-- hidden table -->
              <div class="table-responsive" hidden>
                <table class="table table-bordered" id="salesrep" width="100%" cellspacing="0">        
                  <thead>
                      <tr>
                        <th>Product</th>
                        <th>QTY</th>
                        <th>Date</th>
                        <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                        $from_date = $_GET['from_date'];
                        $to_date = $_GET['to_date'];

                        $query = "SELECT PRODUCTS, QTY, transac_date, QTY * PRICE AS total_price
                                  FROM transaction_details
                                  WHERE transac_date BETWEEN '$from_date' AND '$to_date' ";
                        $query_run = mysqli_query($db, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                          foreach($query_run as $row) { ?>
                            <tr>
                              <td><?= $row['PRODUCTS']; ?></td>
                              <td><?= $row['QTY']; ?></td>
                              <td>
                                <?php 
                                  $t = $row['transac_date'];
                                  $d=strtotime($t);
                                  echo date("M-d-Y", $d);
                                ?>
                              </td>
                              <td><?php echo number_format($row['total_price'], 2); ?></td>
                            </tr> <?php
                          } ?>
                            <tr><td></td><td></td><td></td><td></td></tr>
                            <tr>
                              <td style="font-weight:600;">Total Sales</td>
                              <td></td>
                              <td></td>
                              <td style="font-weight:600;">
                                <?php
                                  $qry = "SELECT SUM(QTY * PRICE) AS total_sales
                                  FROM transaction_details
                                  WHERE transac_date BETWEEN '$from_date' AND '$to_date' ";
                                  $qry_run = mysqli_query($db, $qry);
                                  $res = mysqli_fetch_assoc($qry_run);

                                   echo number_format($res["total_sales"], 2);
                                ?>
                              </td>
                            </tr>
                          <?php
                        } else {
                          echo "No Record Found";
                        }
                      } else {

                        $query = 'SELECT PRODUCTS, QTY, transac_date, QTY * PRICE AS total_price
                                  FROM transaction_details
                                  ORDER BY transac_date DESC';
                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
              
                        while ($row = mysqli_fetch_assoc($result)) {
                        $t = $row['transac_date'];
                        $d=strtotime($t);
                        
                        echo '<tr>';
                        echo '<td>'. $row['PRODUCTS'].'</td>';
                        echo '<td>'. $row['QTY'].'</td>';
                        echo '<td>'. date("M-d-Y", $d).'</td>';
                        echo '<td>'. number_format($row['total_price'], 2) .'</td>';
                        echo '</tr> ';
                        } ?>
                        <tr><td></td><td></td><td></td><td></td></tr>
                        <tr>
                          <td style="font-weight:600;">Total Sales</td>
                          <td></td>
                          <td></td>
                          <td style="font-weight:600;">
                            <?php
                              $qry2 = "SELECT SUM(QTY * PRICE) AS total_sales
                              FROM transaction_details";
                              $qry_run2 = mysqli_query($db, $qry2);
                              $res2 = mysqli_fetch_assoc($qry_run2);
  
                              echo number_format($res2["total_sales"], 2);
                            ?>
                          </td>
                        </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>

              <div class="table-responsive" id="report">
                <table class="table table-bordered" id="salesTable" width="100%" cellspacing="0" data-ordering="false" data-paging="false">        
                  <thead>
                      <tr>
                        <th>Product</th>
                        <th>QTY</th>
                        <th>Date</th>
                        <th>Total</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      if(isset($_GET['from_date']) && isset($_GET['to_date'])) {
                        $from_date = $_GET['from_date'];
                        $to_date = $_GET['to_date'];

                        $query = "SELECT PRODUCTS, QTY, transac_date, QTY * PRICE AS total_price
                                  FROM transaction_details
                                  WHERE transac_date BETWEEN '$from_date' AND '$to_date' ";
                        $query_run = mysqli_query($db, $query);

                        if(mysqli_num_rows($query_run) > 0) {
                          foreach($query_run as $row) { ?>
                            <tr>
                              <td><?= $row['PRODUCTS']; ?></td>
                              <td><?= $row['QTY']; ?></td>
                              <td>
                                <?php 
                                  $t = $row['transac_date'];
                                  $d=strtotime($t);
                                  echo date("M-d-Y", $d);
                                ?>
                              </td>
                              <td><?= number_format($row['total_price'], 2); ?></td>
                            </tr> <?php
                          }
                        } else {
                          echo "No Record Found";
                        }
                      } else {

                        $query = 'SELECT PRODUCTS, QTY, transac_date, QTY * PRICE AS total_price
                                  FROM transaction_details
                                  ORDER BY transac_date DESC';
                        $result = mysqli_query($db, $query) or die (mysqli_error($db));
            
                        while ($row = mysqli_fetch_assoc($result)) {
                        $t = $row['transac_date'];
                        $d=strtotime($t);
                        
                        echo '<tr>';
                        echo '<td>'. $row['PRODUCTS'].'</td>';
                        echo '<td>'. $row['QTY'].'</td>';
                        echo '<td>'. date("M-d-Y", $d).'</td>';
                        echo '<td>₱&nbsp;'. number_format($row['total_price'], 2) .'</td>';
                        echo '</tr> ';
                        }
                      }
                    ?>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>
  <script src="../vendor/tableHTMLExport.js"></script>
  <script>
    function demoFromHTML(salesrep) {

      document.getElementById('pdf').onclick = function() {
        var doc = new jsPDF('p', 'pt');
        var res = doc.autoTableHtmlToJson(document.getElementById('salesrep'));
        var height = doc.internal.pageSize.height;
        doc.setFontSize(20);
        doc.text("Clutch Time", 255, 50);
        doc.setFontSize(17);
        doc.text("Sales Report", 257, 70);
        doc.autoTable(res.columns, res.data, {
          startY: 90
        });
        // doc.autoTable(res.columns, res.data, {
        //   startY: doc.autoTableEndPosY() + 50
        // });
        // doc.autoTable(res.columns, res.data, {
        //   startY: height,
        //   afterPageContent: function(data) {
        //     doc.setFontSize(20)
        //     doc.text("After page content", 50, height - data.settings.margin.bottom - 20);
        //   }
        // });
        doc.save('sales_report.pdf');
      };

    }
  </script>

<?php
include'../includes/footer.php';
?>