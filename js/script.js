

$(function(){
	var SiteBase = 'http://localhost:78/choxi/';

	function init(){

			get_cart();	
	}
	function setCookie(cname, cvalue, exdays) {
	    var d = new Date();
	    d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    var expires = "expires="+ d.toUTCString();
	    document.cookie = cname + "=" + cvalue + "; " + expires;
	} 

	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}

    function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length,c.length);
	        }
	    }
	    return "";
	}

	function get_cart(){
		$.ajax({
			  method: "GET",
			  url: SiteBase+"cart_data.php",
			  dataType: "json",				
			  success:function(data){
			  	$('#cart_modal table tbody').empty();


			  	if(data=='Cart Empty'){
			  		console.log("empty");
			  		$('#cart_modal table').css("display","none");
			  		$('#empty_cart').removeClass("hidden");
			  	}else{

			  		$('#cart_modal table').css("display","block");
			  		$('#empty_cart').addClass("hidden");

				$.each(data.items, function() {
					var cart_item = $("<tr><td>"+this.qty+"</td><td><img src=\"\" /></td><td>"+this.title+" - "+this.color+"</td><td>"+this.deal_price+"</td><td>"+this.shipping+"</td><td>"+(parseFloat(this.deal_price)+parseFloat(this.shipping))*parseFloat(this.qty)+"</td></tr>")
					$('#cart_modal table tbody').append(cart_item);
				});

				$("#cart_modal .cart_total").text(data.total);
				$("#cart_modal .cart_shipping").text(data.shipping);
				$("#cart_modal .cart_tax").text(data.tax);
				$("#cart_modal .cart_net_total").text(data.net_total);

			  	}

			  		
			  }
			});
	}

	$('#cart_modal').on('show.bs.modal', function () {
	  	get_cart();
	});
	// Serialize data when add to cart button is clicked
	$("#add_to_cart_form").on("submit",function(event){
		var data = $(this).serialize();


			$.ajax({
			  method: "POST",
			  url: SiteBase+"add_to_cart.php",
			  data:data,
			  dataType: "json",				
			  success:function(data){
			  	$('#cart_modal').modal('show')
			  }
			});


		event.preventDefault();
	});
	// Triggers Size atrribute when color is selected
	$("#select_color").change(function(){

		var prd_id=$("#deal_id").val();
		var color = $(this).find('option:selected').data("color");
		
		$.ajax({
			  method: "POST",
			  url: SiteBase+"size.php",
			  data:{
			  	"id":prd_id,
			  	"color": color
			  },
			  beforeSend: function(){
			        $('#size_select select').prop('disabled', true);
			  },
			  complete:function(){
			  		$('#size_select select').prop('disabled', false);	
			  },
			  dataType: "html",
			  success:function(data){

			  	$("#size_select").empty().append(data);
			  		
			  }
			});
	})
	//Cart Modal and Log in Slider
	$('.my_cart_slider').carousel({
	    pause: true,
	    interval: false
	});
	// Cart Slide 
	$('#cart_modal .prev').click(function() {
	  $('.my_cart_slider').carousel('prev');
	  $(".modal_cart_btns").toggleClass("hidden");
	});
	// Cart Slide to Log In 
	$('#cart_modal .next').click(function() {
	  $('.my_cart_slider').carousel('next');
	  $(".modal_cart_btns").toggleClass("hidden");
	});
	// Register 
	$("#register_form").on("submit",function(event){

			$(".email-error").css("display","none");
			$(".password-error").css("display","none");
					var form_status = true;
					var email_validate = $(this).find("input[type='email']");

					if (validateEmail(email)) {
						var form_status = false;
						$(".email-error").css("display","block");
					}

					console.log(email_validate.val());

					var password_validate = $(this).find("input[type='password']");
					if(password_validate.val().length<8){
						$(".password-error").css("display","block");
						var form_status = false;
					}
					
					console.log(form_status);
					if(!form_status){
						return false;
					}
					var data = $(this).serialize();
					$("#register_form_head small").attr("class","");
					$("#register_form_head small").text("");
					$.ajax({
						  method: "POST",
						  url: SiteBase+"register.php",
						  data:data,
						  dataType: "json",				
						  success:function(data){
						  	if(data.success){
						  		console.log("success")
						  		
						  		$("#register_form_head small").text(data.success);
						  		$("#register_form_head small").addClass("success");
						  		setCookie('logged_in','YES',7);
						  		window.location = data.target_url;
						  	}
						  	else if(data.error){
						  		console.log("errror");
						  		$("#register_form_head small").text(data.error);
						  		$("#register_form_head small").addClass("failed")	
						  	}
						  }
						});
					event.preventDefault();
	});
	// Log In 
	$("#login_form").on("submit",function(event){
		$("#log_in_form_head small").attr("class","");
		$("#log_in_form_head small").text("");
		var data = $(this).serialize();
		$.ajax({
			  method: "POST",
			  url: SiteBase+"check_login.php",
			  data:data,
			  dataType: "json",				
			  success:function(data){

			  	if(data.error){
			  		console.log("errror");
			  		$("#log_in_form_head small").text(data.error);
			  		$("#log_in_form_head small").addClass("failed")	
			  	}else{
			  	console.log(data);
			  	setCookie('logged_in','YES',7);
			  	window.location = data.target_url;
			  }
			  }
			});
		event.preventDefault();
	});

	//Edit Address
	$("body").on("click",'.address_edit',function(event){
		console.log("address Edit");
		var dataObj = {
						'id':$(this).data('id'),
						'action':'edit'
				}

		$.ajax({
			  method: "POST",
			  url: SiteBase+"account/address_template.php",
			  data:dataObj,
			  dataType: "html",				
			  success:function(data){

			  	console.log(data);
	  			var options ={
								'html':data
							 }
				$.colorbox(options);
			  	
			  }
			});



		event.preventDefault();
	});

	$("body").on("click",'.address_add',function(event){
		var dataObj = {	
							'id':0,
							'action':'add'
					}

			$.ajax({
				  method: "POST",
				  url: SiteBase+"account/address_template.php",
				  data:dataObj,
				  dataType: "html",				
				  success:function(data){

		  			var options ={
									'html':data,
									onComplete :function(){
										$.validate({
  			  										form : '#user_address'
  			  									});
									}
								 }
					$.colorbox(options);
				  	
				  }
				});
		event.preventDefault();
	})

$("body").on('submit','#user_address',function(event){
	var dataObj = $(this).serialize();
	var StreetAddress = $(this).find("#addressLine1").val();
	var City = $(this).find("#city").val();
	var PostalCode =$(this).find("#zipCode").val();
	var State = $(this).find("#stateName").val();
	var AdditionalAddressInfo = $(this).find("#addressLine2").val();
	$.validate({
  			  form : '#user_address',
			  onSuccess : function($form) {
			  	
			  	//Paid Address validation Service
			  	/*
			  	var Locale = 'en';
			  	    $.ajax({
						        url: 'http://api.address-validator.net/api/verify',
						        type: 'POST',
						        data: { StreetAddress: StreetAddress,
						                City: City,
						                PostalCode: PostalCode,
						                State: State,
						                AdditionalAddressInfo:AdditionalAddressInfo,
						                CountryCode: 'USA',
						                Locale: Locale,
						                APIKey: 'uv-ef2d30663976b5a0304f47d1a3157d76'},
						        dataType: 'json',
						        success: function (json) {
									            // check API result
									            if (typeof(json.status) != "undefined") {
									                status = json.status;
									                formattedaddress = json.formattedaddress;
									                console.log(formattedaddress);

									            }
									            else{
									            	console.log("some Error");
									            }
        							}
    						});
			  	    */

			  	$.ajax({
				  method: "POST",
				  url: SiteBase+"account/process_address.php",
				  data:dataObj,
				  dataType: "json",				
				  success:function(data){

				  	console.log(data);
				  	
				  }
				}); 
			  								}
			});

				

	event.preventDefault();
})

	init();

})