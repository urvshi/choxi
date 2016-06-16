<?php
include_once("includes/initialize.php");

$name = $_POST['name'];
$phone = $_POST['phone'];
$phone = preg_replace('/[^0-9]+/', '', $phone);
$address = $_POST['address'];
$city = $_POST['city'];
$city = str_replace(',', '', $city);

$city = preg_replace('/[^a-z0-9A-Z -]+/', '', $city);


$zip = $_POST['zip'];

$data = array();

$sqlx = "select *  from addresses  where name='{$name}' and address='{$address}'";
$resultx = $dtb->query($sqlx);
$data['count']=$resultx->num_rows;


if($data['count']<=0){
	$sql = "INSERT INTO addresses (name, phone, address, city, zip) 
	VALUES ('{$name}', '{$phone}', '{$address}', '{$city}', '{$zip}');";
	$result = $dtb->query($sql);
	$data['sqlx']= $sql;
}else{
	$sql = "update addresses set name='{$name}', phone='{$phone}', 
	address= '{$address}', city='{$city}', zip='{$zip}'
	where name='{$name}' and address='{$address}' ";
	$result = $dtb->query($sql);
	$data['sqlx']= $sql;
}

echo json_encode($data);
?>