<?php include_once("header.php"); 
$id=$_REQUEST['id'];

  $sql = "select * from deal where id={$id} limit 1";
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){

?>
<div class="container">
	<div id="deal_gallery">
		<div id="deal_gallery_large">	
	      <a href="images/<?php echo $result->main_image; ?>" data-lightbox="trip"><img src="<?php echo SITE_BASE; ?>scripts/image.php?width=516&height=516&cropratio=1:1&image=<?php echo SITE_BASE; ?>images/<?php echo $result->main_image; ?>" data-lightbox="roadtrip" class="img-responsive"></a>
	     </div>

		<div id="deal_gallery_thumb" style="clear: both;">

		<?php
			$images = explode("|",$result->images);
			foreach ($images as $image) {
   		?>
   		<a href="images/<?php echo $image; ?>" data-lightbox="trip"><img src="<?php echo SITE_BASE; ?>scripts/image.php?width=100&height=100&cropratio=1:1&image=<?php echo SITE_BASE; ?>images/<?php echo $image; ?>"   data-image-id="1" ></a>
		<?php
			}
		?>
			
			<div style="clear: both;"></div>
		</div>

		<div id="deal_description">
			<h4>Description</h4>
			<p><?php echo $result->description; ?>
			</p>

		</div>
	</div>

	<div id="deal_deatil">
	<h3 class="deal_title"><?php echo $result->title; ?></h3>	
	<div>
		<div class="price hidden-xs">
		<div class="discount text-center">
			<s class="discount-retail">Retail Price <?php echo $result->retail_price; ?></s> | <span class="discount-percent">38% off</span>
		</div>
		<h3 style="padding-bottom: 0;">$<?php echo $result->deal_price; ?></h3>
		<div class="sale-price text-uppercase">Sale Price</div>
		</div>
	</div>

	<form id="add_to_cart_form">

	  <div class="form-group">
	  <input type="hidden" name="deal_id" id="deal_id" value="<?php echo $id ?>">
	  <label>Quantity</label>
	      <select class="form-control" name="qty" id="exampleSelect1">
		      <option>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		      <option>6</option>
		      <option>7</option>
		      <option>8</option>
		      <option>9</option>
		      <option>10</option>
		    </select>  
	    </div>


<?php
if($result->variation=="Color"){
	$selection_id="color";
 	include_once("colors.php");
}
if($result->variation=="Size"){
	$selection_id="size";
	echo '<div class="form-group" id="size_select">';
	include_once("size.php");
	echo '</div>';
}
if($result->variation=="Color_Size"){
	$selection_id="color_size";
	include_once("colors.php");
	echo '<div class="form-group" id="size_select">';
	include_once("size.php");
	echo '</div>';
}
?>

	  <div class="btn-group">
	  	<button type="submit" id="add_to_cart_btn" class="btn btn-primary">Add To Cart</button>
	  </div>
	</form>

	<div class="deal_share">
	<p class="share_title" style="text-align: center;">Share This deal</p>
	<p><img src="site_pic/share.JPG" class="img-responsive"></p>
	</div>


	<div id="similar_deals">

			<div class="deal_box">
				<div class="deal_container  group">
					
					<img src="<?php echo SITE_BASE; ?>scripts/image.php?width=500&height=500&cropratio=1:1&image=<?php echo SITE_BASE; ?>images/3.jpg" class="deal_image img-responsive" />
					<p class="deal_title truncate">2-Piece Set: Hooded Cotton-Blend Velour Track Suit with Rhinestone Trim - Assorted Colors & Extended Sizes </p>
					<p class="deal_info"><span class="pull-left">$14.99</span><span class="discount">71% Off</span><span class="pull-right"><i class="fa fa-align-justify"></i><i class="fa fa-heart"></i></span></p>
				</div>
			</div>

			<div class="deal_box">
				<div class="deal_container  group">
					
					<img src="<?php echo SITE_BASE; ?>scripts/image.php?width=500&height=500&cropratio=1:1&image=<?php echo SITE_BASE; ?>images/3.jpg" class="deal_image img-responsive" />
					<p class="deal_title truncate">2-Piece Set: Hooded Cotton-Blend Velour Track Suit with Rhinestone Trim - Assorted Colors & Extended Sizes </p>
					<p class="deal_info"><span class="pull-left">$14.99</span><span class="discount">71% Off</span><span class="pull-right"><i class="fa fa-align-justify"></i><i class="fa fa-heart"></i></span></p>
				</div>
			</div>
	</div>


	</div>



</div>
<?php
}

 include_once("footer.php"); 
 ?>