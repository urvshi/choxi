<?php

include_once("includes/init.php");

$email =$dtb->escape_value(trim($_POST['email']));
$target_url = $dtb->escape_value($_POST['target_url']);
$raw_password = $dtb->escape_value(trim($_POST['password']));
$password =  hashPassword($raw_password, 'sheath');
$data['target_url'] = $target_url;

		$sql_email = "select * from users where email='{$email}' and password='{$password}' limit 1";


		$result_set_email = $dtb->query($sql_email);

		if($result_set_email->num_rows == 1){
			while( $result_email = $result_set_email->fetch_object()){
				$_SESSION['user']['loged_in']="YES";
				$_SESSION['user']['id']=$result_email->id;
				$_SESSION['user']['email']=$result_email->email;
			}
		}
		else{

			$data['error']	= 'Email Or password is Wrong ';

		}




echo json_encode($data);
?>