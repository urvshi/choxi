 <div class="form-group">
	  <label>Color</label>
	      <select class="form-control" name="product_id" data-id="<?php echo $selection_id ?>" id="select_color">
 <?php
 $sql_c = "select * from variation where deal_id={$id} group by color";

  $result_setc = $dtb->query($sql_c);
  $c=0;
  while( $resultc = $result_setc->fetch_object()){
  	$color_array[$c]=$resultc->color;
?>
		      <option value="<?php echo $resultc->id; ?>" data-color="<?php echo $resultc->color; ?>"  name="product_id"  <?php if ($c==0) { echo "selected"; }?> > <?php echo $resultc->color; ?> </option>

<?php
$c++;
  }
 ?>
		    </select>  
	    </div>