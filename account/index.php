<?php 
$check_log_in ="YES";
include_once("../header.php"); 
$id=$_SESSION['user']['id'];
?>
<div class="container">
	<div class="row">

		<div id="myAccount" class="">

		    <ul class="nav nav-tabs" id="accountTabs">
		      <li class="active"><a data-target="#account" data-toggle="tab">My Account</a></li>
			  <li><a data-target="#orders" data-toggle="tab">Orders</a></li>
			  <li><a data-target="#billing" data-toggle="tab">Address Book</a></li>
			  <li><a data-target="#prefence" data-toggle="tab">Preference</a></li>
			</ul>

			<div class="tab-content  clearfix">
			<div class="tab-pane active" id="account">Account</div>
			  <div class="tab-pane" id="orders">Orders</div>
			  <div class="tab-pane" id="billing">
			  		<h3>Addresses <span class="btn btn-primary address_add btn-small" data-action="add">Add Address</span></h3>
			  		<div class="col-md-12" id="address_list">
<?php
  $sql = "select * from billing where buyer_id='{$id}'";
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){

?>

			  				<div class="col-md-4 address" >
			  					<p class="address_action">
			  						<span><a href="" class="address_edit" data-action="edit" data-id="<?php echo $result->id  ?>"><i class="fa fa-edit fa-lg"></i></a></span>
			  						<span><a href="" class="address_delete" data-id="<?php echo $result->id  ?>"><i class="fa fa-trash fa-lg"></i></a></span>
			  					</p>
			  					<p><?php echo $result->fname  ?> <?php echo $result->lname  ?> </p>
			  					<p><?php echo $result->add1  ?></p>
			  					<p><?php echo $result->city  ?></p>
			  					<p><?php echo $result->state  ?></p>
			  					<p><?php echo $result->zip  ?> </p>
			  					<p>Phone : <?php echo $result->phone  ?> </p>
			  				</div>
<?php
	}
?>			  				
			  		</div>
			  </div>
			  <div class="tab-pane" id="prefence">Preference</div>
			</div>
		</div>
	</div>
</div>
<?php
include_once("../footer.php"); 
?>
