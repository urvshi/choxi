<?php include_once("includes/init.php")	 ?> 
	  <label>Size</label>
	      <select class="form-control" name="product_id" >
<?php

	if(isset($_POST['id'])){
		$id=$_POST['id'];
		$color_array[0]=$_POST['color'];

	}

	if(isset($color_array[0])){
		$sql_s = "select * from variation where deal_id={$id} and color='{$color_array[0]}'";
	}
	else{
		$sql_s = "select * from variation where deal_id={$id}";
	}


  $result_sets = $dtb->query($sql_s);
  $s=0;
  while( $results = $result_sets->fetch_object()){
 	
	?>
		      <option value="<?php echo $results->id; ?>" name="product_id" <?php if ($s==0) { echo "selected"; }?> > <?php echo $results->size; ?> </option>

<?php
	$s++;
  }


?>

		    </select>  
	 