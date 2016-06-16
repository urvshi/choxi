<?php include_once("includes/init.php");

if(isset($_SESSION['cart'])){

}
else{
	$_SESSION['cart']=array();
}
?>
<?php
$deal_id = $_POST['deal_id'];
$product_id = $_POST['product_id'];
$qty = $_POST['qty'];
$sql = "SELECT * from variation JOIN deal ON variation.deal_id=deal.id where variation.id={$product_id} and deal.id={$deal_id}"; 

$product = array();

  $result_set = $dtb->query($sql);

  while( $result = $result_set->fetch_object()){

	$product['color'] = $result->color;
	$product['title'] = $result->title;
	$product['deal_id'] = $result->deal_id;
	$product['deal_price'] = $result->deal_price;
	$product['id'] = $product_id;
	$product['main_image'] = $result->main_image;
	$product['retail_price'] = $result->retail_price;
	$product['shipping'] = $result->shipping;
	$product['size'] = $result->size;
	$product['variation'] = $result->variation;
	$product['title'] = $result->title;
	$product['variation_image'] = $result->variation_image;
	$product['qty'] = $qty;
  	}
  	if(isset($_SESSION['cart']['items'][$product["id"]])){
  		$_SESSION['cart']['items'][$product["id"]]['qty'] +=$qty;
  	}
  	else{
	$_SESSION['cart']['items'][$product["id"]] = $product;
	}

$_SESSION['cart']['total']=0;
$_SESSION['cart']['shipping']=0;
$_SESSION['cart']['net_total']=0;
$_SESSION['cart']['tax']=0;
foreach ($_SESSION['cart']['items'] as  $item) {
	$_SESSION['cart']['total'] +=$item['deal_price']*$item['qty'];
	$_SESSION['cart']['shipping'] += $item['shipping'];
}
$_SESSION['cart']['net_total'] = $_SESSION['cart']['total']+$_SESSION['cart']['shipping']+$_SESSION['cart']['tax'];
$_SESSION['error'] = '';
echo json_encode($_SESSION['cart']);
?>