<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"> </script>
<script>
var x,y,myLatLng;
$(function(){
	
	$.get('http://ip-api.com/json',
	{ip:'14.139.249.201'},
	function(data){
		myLatLng = {lat: data.lat, lng: data.lon};
		initMap();
	});
	

});

function initMap() {
 // var myLatLng = {lat: x, lng: y};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 8,
    center: myLatLng
  });

  var marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'MNNIT'
  });
  
}

</script>



<?php


?>
<div class="container">
<html>
	<br>
<br>
<br>

	<div class="jumbotron">
    <img src="images/logo.png" style="width:12%;height:12%;" />
      <h1>MNNIT SaaS Network welcomes you</h1>
	</div>
<?php
$addr="127.0.0.1";

$client= stream_socket_client("tcp://$addr:1069",$errno,$errormessage);


if($client === false)
	echo "failed in socket creation";
$query = "retrieveN -key ".$_GET['query_field']."\n";

fwrite($client,$query);
fflush($client);

$c=stream_get_contents($client,400,0);
echo "<br />".$c;
$lines=explode("\n",$c);
echo "lines";
$accepted=array();
$r="/(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)/";
foreach($lines as $line){
  //try to get the ip
  $t=array();
  preg_match($r,$line,$t);
  $ip=$t[0];
  $accepted[]=$ip;
}

foreach($accepted as $ip)
{
	if($ip!="")
	echo "<a href=ssh://".$ip." value=".$ip.">heya</a>";	
}

//socket_close($client);
//echo 'x';




echo 'x';
?>
<div id="map" style="height: 300px; width:300px;"></div>
</html>
</div>
