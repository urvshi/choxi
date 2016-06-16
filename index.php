<?php include_once("header.php"); ?>
<div class="container">
		<div class="row deal_box_row">
			


  <?php
  $sql = "select * from deal";
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){
  ?>
   <div class="deal_box">
				<div class="deal_container  group">
									
					<a href="<?php echo SITE_BASE; ?>deal.php?id=<?php echo $result->id?>"><img src="<?php echo SITE_BASE; ?>scripts/image.php?width=500&height=500&cropratio=1:1&image=<?php echo SITE_BASE; ?>images/<?php echo $result->main_image?>" class="deal_image img-responsive" /></a>
					<a href="<?php echo SITE_BASE; ?>deal.php?id=<?php echo $result->id?>"><p class="deal_title truncate"><?php echo $result->title?> </p></a>
					<p class="deal_info"><span class="pull-left">$<?php echo $result->deal_price?></span><span class="discount">71% Off</span><span class="pull-right"><i class="fa fa-align-justify"></i><i class="fa fa-heart"></i></span></p>
				</div>
			</div>
  <?php
  }
  ?> 

		</div>		

</div>

<?php include_once("footer.php"); ?>