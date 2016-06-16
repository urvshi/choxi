<?php 
$check_log_in ="YES";
?>
<?php include_once("landing_header.php"); 
$buyer_id = $_SESSION['user']['id'];
?>
<div id="cart_modal" class="container order_detail">
	<div class="row">
		<div class="col-md-12">
		<div class=" box-step billing-address">
	  		<h3><strong>1</strong> Order Summary</h3>
        <table>
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
        </div>
    </div>
</div>

<?php
if(isset($_SESSION['error']) && $_SESSION['error']!='Cart Empty'){
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				  	<div class=" box-step billing-address">
				  		<h3><strong>2</strong> Shipping Address</h3>
				  		<p> Please Provice valid Shipping Address.</p>
					<form id="shipping_form">
					  <div class="form-group row">
				       <label class="col-sm-3 form-control-label" for="shipping_address">Select an Address</label>
				       <div class="col-sm-9">
						  <select class="form-control checkout_address"  data-form="shipping_form">
						  <option value="0">Enter new Address</option>
						      	<?php
								  $sql = "select * from billing where buyer_id={$buyer_id}";
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
								?>
										<option selected value="<?php echo $result->id ?>"><?php echo $result->fname.' '.$result->lname.' - '.$result->city.', '.$result->state ?></option>
								<?php
									}
								?>
						    </select>
						</div>
				    </div>
					  <div class="form-group row">
					    <label for="inputName" class="col-sm-3 form-control-label">First Name</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control fname" value="<?php echo $fname; ?>" id="inputName" placeholder="First Name">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="lastName" class="col-sm-3 form-control-label">Last Name</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control lname" value="<?php echo $lname; ?>"    id="lastName" placeholder="First Name">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="addressLine1" class="col-sm-3 form-control-label">Addressl Line1</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control add1" value="<?php echo $add1; ?>"   id="addressLine1" placeholder="Addres line">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="addressLine2" class="col-sm-3 form-control-label">Address Line2</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control add2" value="<?php echo $add2; ?>"   id="addressLine2" placeholder="address Line">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="zipCode" class="col-sm-3 form-control-label">Zip Code</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control zip" value="<?php echo $zip; ?>"    id="zipCode" placeholder="Zipcode">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="city" class="col-sm-3 form-control-label">City</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control city" value="<?php echo $city; ?>"    id="city" placeholder="City">
					    </div>
					  </div>
					
				    <div class="form-group row">
				       <label class="col-sm-3 form-control-label" for="stateName"> State</label>
				       <div class="col-sm-9">
						  <select class="form-control" id="stateName">
						   

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
				     <div class="form-group row">
					    <label for="phoneNumber" class="col-sm-3 form-control-label">Phone NUmber</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control phone"  value="<?php echo $phone; ?>"  class="phone" id="phoneNumber" placeholder="123-456-7890">
					    </div>
					  </div>
			        <div> 
			        <p class="text-muted">* We may need to contact you about your order while it's in transit.</p>
			        </div>
					  
					</form>
				  	</div>
			</div>
			<div class="col-md-6">
				  	<div class=" box-step billing-address">
				  		<h3><strong>3</strong> Billing Address</h3>
				  		<p> Please Provice valid Shipping Address.</p>
					<form id="billing_form">
					  <div class="form-group row">
				       <label class="col-sm-3 form-control-label" for="billing_address">Select an Address</label>
				       <div class="col-sm-9">
						  <select class="form-control checkout_address" data-form="billing_form">
						  <option value="0">Enter new Address</option>
						      	<?php
								  $sql = "select * from billing where buyer_id={$buyer_id}";
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
								?>
										<option selected value="<?php echo $result->id ?>"><?php echo $result->fname.' '.$result->lname.' - '.$result->city.', '.$result->state ?></option>
								<?php
									}
								?>
						    </select>
						</div>
				    </div>
					  <div class="form-group row">
					    <label for="inputName" class="col-sm-3 form-control-label">First Name</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control fname" value="<?php echo $fname; ?>" id="inputName" placeholder="First Name">
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="lastName" class="col-sm-3 form-control-label">Last Name</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control lname" value="<?php echo $lname; ?>"    id="lastName" placeholder="First Name">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="addressLine1" class="col-sm-3 form-control-label">Addressl Line1</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control add1" value="<?php echo $add1; ?>"   id="addressLine1" placeholder="Addres line">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="addressLine2" class="col-sm-3 form-control-label">Address Line2</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control add2" value="<?php echo $add2; ?>"   id="addressLine2" placeholder="address Line">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="zipCode" class="col-sm-3 form-control-label">Zip Code</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control zip" value="<?php echo $zip; ?>"    id="zipCode" placeholder="Zipcode">
					    </div>
					  </div>
					   <div class="form-group row">
					    <label for="city" class="col-sm-3 form-control-label">City</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control city" value="<?php echo $city; ?>"    id="city" placeholder="City">
					    </div>
					  </div>
					
				    <div class="form-group row">
				       <label class="col-sm-3 form-control-label" for="stateName"> State</label>
				       <div class="col-sm-9">
						  <select class="form-control" id="stateName">
						   

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
				     <div class="form-group row">
					    <label for="phoneNumber" class="col-sm-3 form-control-label">Phone NUmber</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control phone"  value="<?php echo $phone; ?>"  class="phone" id="phoneNumber" placeholder="123-456-7890">
					    </div>
					  </div>
			        <div> 
			        <p class="text-muted">* We may need to contact you about your order while it's in transit.</p>
			        </div>
					  
					</form>
				  	</div>
			</div>
			
		</div>
	</div>
<?php
}
else{

}
?>
<?php include_once("footer.php"); ?>
