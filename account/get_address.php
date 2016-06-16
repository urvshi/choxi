 <?php 
$check_log_in ="YES";
include_once("../includes/init.php"); 
$data = array();
$buyer_id = $_SESSION['user']['id'];
$id = $_POST['id'];

 $sql = "select * from billing where buyer_id={$buyer_id} and id='{$id}'";

  $x=0;
  $result_set = $dtb->query($sql);
  while( $result = $result_set->fetch_object()){

	  	$data['id']=$result->id;
	  	$data['fname']=$result->fname;
	  	$data['lname']=$result->lname;
	  	$data['add1']=$result->add1;
	  	$data['add2']=$result->add2;
	  	$data['state']=$result->state;
	  	$data['zip']=$result->zip;
	  	$data['city']=$result->city;
		$data['phone']=$result->phone;
  	$x++;
  }
echo json_encode($data);
?>