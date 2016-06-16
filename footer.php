
    <div class="container">
      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>
    </div>


	<div id="cart_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Shopping Cart</h4>
    </div>

    <div class="modal-body">
           <div id="carousel-example-generic" class="my_cart_slider slide" data-ride="carousel">
              <div class="carousel-inner">

                <div class="item active">
                        <table id="cart_table">
                        <thead>
                          <tr>
                            <td class="qty">Quantity</td>
                            <td class="image">Item</td>
                            <td class="item">Item</td>
                            <td class="price">Unit Price</td>
                            <td class="price">Shipping</td>
                            <td class="total">Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                                  <tfoot>
                          <tr>
                            <td colspan="2"></td>
                            <td></td>
                            <td colspan="3">
                            <p>Summary<p>
                              <div id="cart_totals">
                                <p>Sub Total : <span class="cart_total"></span></p>
                                <p>Shipping : <span class="cart_shipping"></span></p>
                                <p>Sales Tax : <span class="cart_tax"></span></p>
                                <p>Total : <span class="cart_net_total"></span></p>
                              </div>
                            </td>
                          </tr>
                        </tfoot>
                      </table>

                      <div id="empty_cart" class="hidden">
                        <h3>Your Cart is Empty</h3>
                      </div>
                </div>
                <div class="item">
                  
                    <div class="row centered-form">
                      <div class="col-xs-6" style="border-right:dotted 1px #ccc">
                        <div class="">
                          <div class="">
                            <h3 class="panel-title" id="log_in_form_head">Log In <small></small></h3>
                          </div>
                          <div class="panel-body">
                            <form role="form" id="login_form">

                              <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                <input type="hidden" name="target_url" value="checkout.php" />
                              </div>

                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                  </div>
                                </div>
                              </div>
                              
                              <input type="submit" value="Log In" class="btn btn-info">
                            
                            </form>
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-6">
                        <div class="">
                          <div class="">
                            <h3 class="panel-title" id="register_form_head">Register <small></small></h3>
                          </div>
                          <div class="panel-body">
                            <form role="form" id="register_form">

                              <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                <small class="errors email-error">Please Enter Valid Email</small>
                                <input type="hidden" name="target_url" value="checkout.php" />
                              </div>

                              <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    <small class="errors password-error">Password Must be atleaset 8 Character</small>
                                  </div>
                                </div>
                              </div>
                              
                              <input type="submit" value="Register" class="btn btn-info">
                            
                            </form>
                          </div>
                        </div>
                      </div>
                  </div>

                </div>
              </div>
          </div>
    </div>

    <div class="modal-footer">
      <div class="modal_cart_btns">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal" >Continue Shopping</button>
        
        <?php
          if(isset($_SESSION['user']['loged_in']) && $_SESSION['user']['loged_in']='YES'){

        ?>
        <a href="checkout.php" class="btn btn-default" >Checkout</a>
        <?php
        }else{
        ?>
      
        <button type="button" class="btn btn-default next" >Checkout</button>
        <?php
      }
        ?>
      </div>
      <div class="modal_cart_btns hidden">
        <button type="button" class="btn btn-default prev pull-left" >Back To Cart</button>
      </div> 
      </div>
    </div>

  </div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified CSS -->

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script> 
  <script src="<?php echo SITE_BASE; ?>lightbox/js/lightbox.js"></script>
  <script src="<?php echo SITE_BASE; ?>js/jquery.colorbox.js"></script>
  <script src="<?php echo SITE_BASE; ?>js/script.js"></script>
 

 
  </body>
</html>