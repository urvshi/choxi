<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" id="barcode_scan">
<input type="text" id="barcode"  name="barcode" />
<input type="submit" value="scann">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	$("#barcode_scan").submit(function(event){
		
	var SiteBase = 'http://localhost:78/choxi/';


		if($("#barcode").val().length==11){
			console.log($("#barcode").val());
			var barcode = $("#barcode").val();
				var dataObj={
								"barcode":barcode
							}
		
			$.ajax({
				  method: "POST",
				  url: SiteBase+"account/get_address.php",
				  data:dataObj,
				  dataType: "json",				
				  success:function(data){
				  }
				});
			$("#barcode").val('');
		}
		event.preventDefault();
	})

</script>
</body>
</html>