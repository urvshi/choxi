<?php include_once("header.php"); 
unset($_SESSION['user']);
?>
<div class="container">


<p>Please Log In Or Register Before your procceed to checkout.</p>
<div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" id="log_in_page">
    

    <div class="modal-body">
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
                                <input type="hidden" name="target_url" value="index.php" />
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
                                <input type="hidden" name="target_url" value="index.php" />
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
<?php include_once("footer.php"); ?>