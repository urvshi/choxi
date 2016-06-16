<?php include_once("includes/init.php");
if(isset($_SESSION['cart'])){
	$_SESSION['cart']['total']=0;
	foreach ($_SESSION['cart']['items'] as  $item) {
		$_SESSION['cart']['total'] +=$item['deal_price']*$item['qty'];
	}
	echo json_encode($_SESSION['cart']);
}
else{
	$_SESSION['error'] = "Cart Empty";
	echo json_encode($_SESSION['error']);
}


?>