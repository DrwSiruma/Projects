  <?php   
    if(!empty($_SESSION['pointofsale'])):  
            
      $total = 0; ?>

      <div class="card-body col-md-3">

        <?php
        foreach($_SESSION['pointofsale'] as $key => $product):

          $total = $total + ($product['quantity'] * $product['price']);
        
        endforeach;

        //DROPDOWN FOR CUSTOMER
        // $sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME
        //         FROM customer
        //         order by FIRST_NAME asc";
        $sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME
                FROM customer
                WHERE CUST_ID ='11'";
        $res = mysqli_query($db, $sql) or die ("Error SQL: $sql");

        $opt = "<select class='form-control'  style='border-radius: 0px;' name='customer' hidden>";
          while ($row = mysqli_fetch_assoc($res)) {
            $opt .= "<option value='".$row['CUST_ID']."' selected>".$row['FIRST_NAME'].' '.$row['LAST_NAME']."</option>";
          }
        $opt .= "</select>";
        // END OF DROP DOWN
        
        echo "Today's date is : "; 
        $today = date("Y-m-d H:i a"); 
        echo $today; 
        ?>

        <input type="hidden" name="date" value="<?php echo $today; ?>">
        <div class="form-group row text-left mb-3">
          <div class="col-sm-12 text-dark btn-group">
            <?php echo $opt; ?>
            <!-- <a  href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-dark bg-dark" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a> -->
          </div>
        </div>
          
        <div class="form-group row mb-2">

          <div class="col-sm-5 text-left text-primary py-2">
            <h6>
              Subtotal
            </h6>
          </div>
          <div class="col-sm-7">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">₱</span>
              </div>
              <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>">
              <input type="text" class="form-control text-right " value="<?php echo $total; ?>" name="subtotal" hidden>
            </div>
          </div>

        </div>
      
        <div class="form-group row text-left mb-2">
          <div class="col-sm-5 text-primary">
            <h6 class="font-weight-bold py-2">
              Total
            </h6>
          </div>

          <div class="col-sm-7">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text">₱</span>
              </div>
              <input type="text" class="form-control text-right " value="<?php echo number_format($total, 2); ?>">
              <input type="text" class="form-control text-right " value="<?php echo $total; ?>" name="total" hidden>
            </div>
          </div>

        </div>

        <?php if ($_SESSION['TYPE'] == 'User'){ ?>
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#userMODAL">SUBMIT</button>
          <!-- Modal -->
          <div class="modal fade" id="userMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row text-left mb-2">

                      <div class="col-sm-12 text-center">
                        <h3 class="py-0">
                          GRAND TOTAL
                        </h3>
                        <h3 class="font-weight-bold py-3 bg-light">
                          ₱ <?php echo number_format($total, 2); ?>
                        </h3>
                      </div>

                    </div>
                    <div class="form-group row text-left mb-2">
                      <div class="col-sm-6 mb-2">
                        <div class="input-group mb-2 d-flex align-items-center">
                          <input type="radio" id="cod" name="payment" onchange="enableButton()">
                          <label for="cod" class="ml-1" style="margin-bottom: 0;">COD</label>
                        </div>
                      </div>
                      <div class="col-sm-6 mb-2">
                        <div class="input-group mb-2 d-flex align-items-center">
                          <input type="radio" id="gcash" name="payment" onchange="enableButton()">
                          <label for="gcash" class="ml-1" style="margin-bottom: 0;">GCASH</label>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit2" id="submitBtn" class="btn btn-primary btn-block" disabled>PROCEED TO PAYMENT</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END OF Modal -->
        <?php } else { ?>
          <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SUBMIT</button>
          <!-- Modal -->
          <div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalCenterTitle">SUMMARY</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row text-left mb-2">

                      <div class="col-sm-12 text-center">
                        <h3 class="py-0">
                          GRAND TOTAL
                        </h3>
                        <h3 class="font-weight-bold py-3 bg-light">
                          ₱ <?php echo number_format($total, 2); ?>
                        </h3>
                      </div>

                    </div>

                      <div class="col-sm-12 mb-2">
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <span class="input-group-text">₱</span>
                          </div>
                          <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTER CASH" name="cash" required>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block">PROCEED TO PAYMENT</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END OF Modal -->
        <?php } ?>

        </form>
      </div> <!-- END OF CARD BODY -->
      <?php 
    endif; ?>

    <?php   
      if(empty($_SESSION['pointofsale'])): ?>
          <div class="card-body col-md-3">
            <?php
                echo "Today's date is : "; 
                $today = date("Y-m-d H:i a"); 
                echo $today;
            ?>
            <br />
            <button type="button" class="btn btn-block btn-success disabled">SUBMIT</button>
          </div>
        </form>
        <?php
      endif;
    ?>

<script>
  function enableButton() {
    document.getElementById('submitBtn').disabled = false;
  }
</script>