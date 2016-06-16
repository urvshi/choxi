<?php 
$check_log_in ="YES";
include_once("../includes/init.php"); 
if(isset($_POST)){

	$data = array();

	$fname = $dtb->escape_value(trim($_POST['fname']));
	$lname = $dtb->escape_value(trim($_POST['lname']));
	$add1 = $dtb->escape_value(trim($_POST['add1']));
	$add2 = $dtb->escape_value(trim($_POST['add2']));
	$city = $dtb->escape_value(trim($_POST['city']));
	$zip = $dtb->escape_value(trim($_POST['zip']));
	$state = $dtb->escape_value(trim($_POST['state']));
	$phone = $dtb->escape_value(trim($_POST['phone']));
	$buyer_id = $_SESSION['user']['id'];
	$action = $_POST['action'];

if($action=='add'){

	$sql = "INSERT INTO billing 
	    (`id`, `fname`, `lname`,  `add1`, `add2`,`state`,`zip`,`city`,`phone`,`buyer_id`) 
	    VALUES 
	    (NULL, '{$fname}', '{$lname}', '{$add1}', '{$add2}', '{$state}', '{$zip}', '{$city}','{$phone}', '{$buyer_id}')";	    
	$dtb->query($sql);
	
	if($dtb->affected_rows()==1){
	$data['result']= "Address Processed";
	}
}
else{
	$id = $dtb->escape_value(trim($_POST['id']));


	$sql = "UPDATE billing SET 
							fname = '{$fname}', 
							lname = '{$lname}', 
							add1 = '{$add1}', 
							add2 = '{$add2}', 
							state = '{$state}', 
							zip = '{$zip}', 
							city = '{$city}', 
							phone = '{$phone}'
							WHERE id = {$id}";
	$dtb->query($sql);
	
	if($dtb->affected_rows()==1){
	$data['result']= "Address Processed";
	}
	$data['result']= "Address Processed";
}
  $sql = "select * from billing where buyer_id={$buyer_id} order by id desc";
  $x=0;
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){

	  	$data['address'][$x]['id']=$result->id;
	  	$data['address'][$x]['fname']=$result->fname;
	  	$data['address'][$x]['lname']=$result->lname;
	  	$data['address'][$x]['add1']=$result->add1;
	  	$data['address'][$x]['add2']=$result->add2;
	  	$data['address'][$x]['state']=$result->state;
	  	$data['address'][$x]['zip']=$result->zip;
	  	$data['address'][$x]['city']=$result->city;
		$data['address'][$x]['phone']=$result->phone;
  	$x++;
  }
}
echo json_encode($data);
?>
