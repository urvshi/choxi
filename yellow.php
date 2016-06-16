<?php
include_once("includes/initialize.php");

$name = htmlentities($_REQUEST['town']);

$name = str_replace(" ","%20",$name);
$zip = htmlentities($_REQUEST['zip']);
if(isset($_REQUEST['page'])){
        $page = htmlentities($_REQUEST['page']);
}else{
        $page=1;
}
if(isset($_REQUEST['count'])){
        $count=htmlentities($_REQUEST['count']);
}else{
        $count=1;
}
       // create curl resource
        $ch = curl_init();
        $url  = "http://www.yellowpages.com/search?search_terms=".$name."&geo_location_terms=".$zip."&page=".$page;
        $query="town=".$name."&zip=".$zip."&page=".($page+1);
        // set url
        curl_setopt($ch, CURLOPT_URL,$url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch); 

        echo $output;

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
//$("body header").css("display","none");

var nav = '<p><button id="grab">Grab</button><a href="yellow.php?<?php echo $query; ?>">Next</p>';

$("body").prepend(nav);
$("body header").hide();



$("#grab").on("click",function(){
var adds = [];
    var data = $("body .search-results.organic .result");
    data.each(function( index ) {

        var bs_name =  $(this).find(".info h3 a").text();
        var phone  =   $(this).find(".info .phones.phone.primary").text();
        var address  =   $(this).find(".info .street-address").text();
        var city  =   $(this).find(".info .locality").text();
        var zip  =   $(this).find(".info .adr span[itemprop='postalCode']").text();

        var single_add = { "name":bs_name,
                           "phone":phone,
                           "address":address,
                           "city":city,
                           "zip":zip
                }
                if(city!=''){   
                    //adds.push(single_add);
                    //console.log(single_add);

                    $.ajax({
                        url: "add_address.php",
                        data:single_add,
                        method:'POST',
                        dataType:'json', 
                        success: function(result){
                                
                                console.log(result);
                        }
                    }); 
                }
    })


})


</script>