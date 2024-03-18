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
  <link rel="stylesheet" href="../css/morris.css">
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h3>Dashboard</h3>
      </div>

      <div class="row">
        <!-- current sales -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-0">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Current Sales</div>
                  <?php
                    $query = "SELECT SUM(SUBTOTAL) as total_sales FROM transaction WHERE MONTH(DATE) = MONTH(CURRENT_DATE()) AND YEAR(DATE) = YEAR(CURRENT_DATE())";
                    $result = mysqli_query($db, $query);
                    $total = mysqli_fetch_array($result);
                  ?>
                  <div class="h6 mb-0 font-weight-bold text-gray-800">
                    <?php if (!empty($total)): ?>
                      <p>₱&nbsp;<?php echo number_format($total['total_sales'], 2); ?></p>
                    <?php endif; ?>
                    <?php if (empty($total)): ?>
                      <p>₱&nbsp;0</p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- employee -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-0">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Previous Sales</div>
                  <?php
                    $query = "SELECT SUM(SUBTOTAL) as previous_sales FROM transaction WHERE MONTH(DATE) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND YEAR(DATE) = YEAR(DATE_ADD(NOW(), INTERVAL -1 MONTH))";
                    $result = mysqli_query($db, $query);
                    $previous = mysqli_fetch_array($result);
                  ?>
                  <div class="h6 mb-0 font-weight-bold text-gray-800">
                    <?php if (!empty($previous)): ?>
                      <p>₱&nbsp;<?php echo number_format($previous['previous_sales'], 2); ?></p>
                    <?php endif; ?>
                    <?php if (empty($previous)): ?>
                      <p>₱&nbsp;0</p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- supplier -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-0">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Grand Total Sales</div>
                  <?php
                    $query = "SELECT SUM(SUBTOTAL) as total_sales FROM transaction";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    $gt = mysqli_fetch_array($result)
                  ?>
                  <div class="h6 mb-0 font-weight-bold text-gray-800">
                    <?php if (!empty($gt)): ?>
                      <p>₱&nbsp;<?php echo number_format($gt['total_sales'], 2); ?></p>
                    <?php endif; ?>
                    <?php if (empty($gt)): ?>
                      <p>₱&nbsp;0</p>
                    <?php endif; ?>
                  </div>
                  
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- products -->
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-0">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Products</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                        <?php 
                          $query = "SELECT COUNT(*) FROM product";
                          $result = mysqli_query($db, $query) or die(mysqli_error($db));
                          while ($row = mysqli_fetch_array($result)) {
                            echo "$row[0]";
                          }
                        ?>&nbsp;Record(s)
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <br>
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-10">
                  <h5><i class="fas fa-chart-line"></i>&nbsp;Sales Overview of <?php echo date('F Y'); ?></h5>
                </div>
                <div class="col-md-2">
                  <p class="lead text-right">
                    <button type="button" id="pdf" onclick="javascript:save();" class="btn btn-danger"><i class="fas fa-download"></i>&nbsp;PDF</button>
                  </p>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div>
                <!-- sales chart -->
                <?php
                  $query = "SELECT
                            SUM(QTY) AS total_qty,
                            SUM(QTY) * PRICE AS total_price,
                            PRODUCTS,
                            YEAR(transac_date) AS year,
                            MONTH(transac_date) AS month
                            FROM transaction_details
                            WHERE MONTH(transac_date) = MONTH(CURRENT_DATE())
                            AND YEAR(transac_date) = YEAR(CURRENT_DATE())
                            GROUP BY PRODUCTS ORDER BY `total_Price` DESC limit 10";
                  // $query = "SELECT SUM(QTY), PRICE, PRODUCTS, SUM(QTY) * PRICE AS total_price FROM `transaction_details` GROUP BY PRODUCTS ORDER BY total_price DESC LIMIT 10";

                  $result = mysqli_query($db, $query);
                  $chart_data = '';

                  while($row = mysqli_fetch_array($result))
                  {
                    $chart_data .= "{ date:'".$row["PRODUCTS"]."', sales:".$row["total_price"]."},  ";
                  }
                  $chart_data = substr($chart_data, 0, -2);
                ?>
              </div>
              <div id="chart" height="158" style="width: 100%;"></div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card gradient-bottom">
            <div class="card-header">
              <h5><i class="fa fa-th-list fa-fw"></i>&nbsp;Top 5 Sold Products</h5>
            </div>

            <div class="card-body" id="top-5-scroll">
              <ul class="list-unstyled list-unstyled-border">
                <?php 
                  $query = "SELECT PRODUCTS, SUM(QTY) as c FROM transaction_details GROUP BY PRODUCTS ORDER BY c DESC LIMIT 5";
                  $result = mysqli_query($db, $query) or die(mysqli_error($db));

                  if( mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)) {

                        echo "<li class=\"media p-2\">
                                <img class=\"mr-3 rounded\" width=\"55\" src=\"../img/products/shoe.png\" alt=\"image\">

                                <div class=\"media-body\">
                              
                                  <div class=\"media-title text-sm-left\">$row[PRODUCTS]</div>
                                  <div class=\"mt-1\">
                                    <div class=\"budget-price\">
                                      <div class=\"budget-price-label\">Total Item Sold : <i>$row[c]</i></div>
                                    </div>
                                  </div>

                                </div>
                              </li>
                              ";
                    }
                  } elseif( mysqli_num_rows($result) == 0){

                    echo "<li class=\"media p-2\">
                                <img class=\"mr-3 rounded\" width=\"55\" src=\"../img/products/shoe.png\" alt=\"image\">

                                <div class=\"media-body\">
                              
                                  <div class=\"media-title text-sm-left\">No Item</div>
                                  <div class=\"mt-1\">
                                    <div class=\"budget-price\">
                                      <div class=\"budget-price-label\">Total Item Sales : <i>0</i></div>
                                    </div>
                                  </div>

                                </div>
                              </li>
                              ";
                  }
                ?>
              </ul>
              <div class="text-center pt-1 pb-1">
                <a href="product.php" style="border-radius:30px;" class="btn btn-primary btn-sm">
                  View All Products
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquerys.min.js"></script>
  <script src="../js/raphael-min.js"></script>
  <script src="../js/morris.min.js"></script>
  <!-- CHART SCRIPT -->
  <script>

    Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data; ?>],
    xkey:'date',
    ykeys:['sales','product'],
    labels:['Sales','Product'],
    hideHover:'auto',
    stacked:true,
    resize:true
    });

  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.1/dist/html2canvas.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet"/>
  
  <script>
    function save() {
      html2canvas(document.getElementById('chart')).then(canvas => {
          var w = document.getElementById("chart").offsetWidth;
          var h = document.getElementById("chart").offsetHeight;

          var img = canvas.toDataURL("image/jpeg", 1);

          var doc = new jsPDF('L', 'pt', [w, 500]);
          doc.setFontSize(20);
          doc.text("Clutch Time: Monthly Sales Chart", 255, 20);
          doc.addImage(img, 'JPEG', 10, 30, w, 400);
          doc.save('sales-chart.pdf');
      }).catch(function(e) {
          console.log(e.message);
      });
    }
  </script>

<?php
include'../includes/footer.php';
?>