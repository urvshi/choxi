<?php 
$check_log_in ="YES";
include_once("../includes/init.php"); 

$action = $_REQUEST['action'];




if($action=='edit'){
   $id = $_REQUEST['id'];
  $sql = "select * from billing where id={$id}";
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){
  	$fname = $result->fname;
  	$lname = $result->lname;
  	$add1 = $result->add1;
  	$add2 = $result->add2;
  	$city = $result->city;
  	$zip = $result->zip;
  	$phone = $result->phone;
  	$state = $result->state;
  }

}else if($action=='add'){
	$id=0;
	$fname = '';
  	$lname = '';
  	$add1 = '';
  	$add2 = '';
  	$city = '';
  	$zip = '';
  	$phone = '';
  	$state = '';
}
?>
<div class="clearfix">
			  	<div class=" box-step billing-address clearfix">
			  		<h3>Edit Address</h3>
			  		
				<form id="user_address" method="post">
				<input type="hidden" name="action" value="<?php echo $action; ?>">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class="col-sm-6 clearfix">
									  <div class="form-group row">
									    <label for="inputName" class="col-sm-3 form-control-label">First Name</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" name="fname"   data-validation="length" data-validation-length="2-50" data-validation-error-msg="Enter Valid First Name" class="form-control" id="inputName" placeholder="First Name" value="<?php echo $fname; ?>">
									    </div>
									  </div>
									  <div class="form-group row">
									    <label for="lastName" class="col-sm-3 form-control-label">Last Name</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" name="lname" class="form-control" id="lastName" placeholder="First Name" data-validation="length" data-validation-length="2-50"  data-validation-error-msg="Enter Valid Last Name" value="<?php echo $lname; ?>">
									    </div>
									  </div>

								     <div class="form-group row">
									    <label for="phoneNumber" class="col-sm-3 form-control-label">Phone NUmber</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" name="phone" value="<?php echo $phone; ?>"class="form-control" id="phoneNumber" data-validation="length" data-validation-length="10"  data-validation-error-msg="Enter Valid Phone No" placeholder="Ex: 5169173478">
									    </div>
									  </div>
									   
						</div>
						<div class="col-sm-6 clearfix">
							<div class="form-group row">
									    <label for="addressLine1" class="col-sm-3 form-control-label">Addressl Line1</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" name="add1" value="<?php echo $add1; ?>" class="form-control" id="addressLine1" data-validation="length" data-validation-length="2-50"  data-validation-error-msg="Address To Short" placeholder="Addres line">
									    </div>
									  </div>
									   <div class="form-group row">
									    <label for="addressLine2"  class="col-sm-3 form-control-label">Address Line2</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" name="add2" value="<?php echo $add2; ?>" class="form-control" id="addressLine2"  placeholder="address Line 2">
									    </div>
									  </div>
									   <div class="form-group row">
									    <label for="zipCode" class="col-sm-3 form-control-label">Zip Code</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" class="form-control" name="zip" value="<?php echo $zip; ?>" id="zipCode" data-validation="length" data-validation-length="5"  data-validation-error-msg="Enter Valid Zip" placeholder="Zipcode">
									    </div>
									  </div>
									   <div class="form-group row">
									    <label for="city" class="col-sm-3 form-control-label">City</label>
									    <div class="col-sm-9 no_padding_left">
									      <input type="text" name="city" value="<?php echo $city; ?>" class="form-control" id="city" data-validation="length" data-validation-length="2-100"  data-validation-error-msg="Enter Valid City Name" placeholder="City">
									    </div>
									  </div>

									    <div class="form-group row">
									       <label class="col-sm-3 form-control-label" for="stateName"> State</label>
									       <div class="col-sm-9 no_padding_left">


											  <select class="form-control" name="state" id="stateName">
<?php										
	$selected='';
foreach ($states as $key => $value) {

	if($state == $key){
			$selected='selected';
	}
	else{
		$selected='';
	}
 ?>
 <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
 <?php
}
?>
										    </select>
										</div>
								    </div>

							 <div> 
							        	        </div>
						</div>	
						<div class="row">
							<div class="col-md-2 col-md-offset-5">
								<p><input type="submit"  class="btn btn-primary" value="Save" /></p>
							</div>
						</div>		  
				</form>

			  	</div>
		</div>