<?php 
include_once("includes/init.php");

$email =$dtb->escape_value(trim($_POST['email']));
$target_url = $dtb->escape_value($_POST['target_url']);
$raw_password = $dtb->escape_value(trim($_POST['password']));
$password =  hashPassword($raw_password, 'sheath');
$data['target_url'] = $target_url;
if($dtb->check_record('users','email',$email) >0){
	$data['error']	= 'User already Exist';
}
else{
	$sql="insert into users (email,password) values('{$email}','{$password}')";
	if($dtb->query($sql)){
		$data['success']	= 'User successfully Created';
		$_SESSION['user']['loged_in']="YES";
		$sql_email = "select * from users where email='{$email}' limit 1";
		$result_set_email = $dtb->query($sql_email);

		while( $result_email = $result_set_email->fetch_object()){
			$_SESSION['user']['id']=$result_email->id;
			$_SESSION['user']['email']=$result_email->email;
		}

		
	}
	else{
		$data['error']	= 'There was an Error Creating your account';
	}
}
echo json_encode($data);
?>