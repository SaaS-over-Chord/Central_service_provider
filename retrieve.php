<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"> </script>
<script>
var x,y,myLatLng,tot;
$(function(){
	
	
	$('a').click(function(e){
		
		var ip=$(this).attr("href");
		//alert(ip);
		$.post('update.php',{'request':'post','ip':ip},function(data){
				console.log(+data);
		});
	});//end a click
	
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




<div class="container">
	<html>

    <br>

	<div class="jumbotron">
    <img src="images/logo.png" style="width:12%;height:12%;" />
      <h1>MNNIT SaaS Network welcomes you</h1>
	</div>
    
    
<table class="table">
    <thead>
      <tr>
        <th>Route Name</th>
        <th>Connections Alive</th>
        <th>Authenticated</th>
      </tr>
    </thead>
    <tbody>
<?php

$addr="127.0.0.1";

$client= stream_socket_client("tcp://$addr:1069",$errno,$errormessage);


if($client === false)
	echo "failed in socket creation";
$query = "retrieveN -key ".$_GET['query_field']."\n";

fwrite($client,$query);
fflush($client);

$c=stream_get_contents($client,400,0);
//echo "<br />".$c;
$lines=explode("\n",$c);

$accepted=array();
$r="/(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)/";

foreach($lines as $line){
  //try to get the ip
  $t=array();
  preg_match($r,$line,$t);
  $ip=$t[0];
  $accepted[]=$ip;
}
$meaningfulIP = 0;


foreach($accepted as $ip)
{
	
	if($ip!="")
	{
		$set=0;
		$count =0 ;
		$xml=simplexml_load_file('data.xml');
		
		$addr="ssh://".$ip;
		foreach($xml->entry as $entry)
		{
			if($entry->ip==$addr)
			{$set=1;$count=$entry->count;}
		}
		
		//echo "set".$set;
		$xml=simplexml_load_file('data.xml');
		if($set==0)
			{
				echo "adding";
				$entry = $xml->addChild('entry');
				$entry->addChild('ip',$addr);	
				$entry->addChild('count','0');
			}
		$xml->asXML('data.xml');
		echo "<tr>";		
		echo "<td><a href=ssh://".$ip." value=".$ip.">".$ip."</a></td>";
		echo "<td>".$count."</td>";
		echo "<td>Yes</td>";
		echo "</tr>";
	}	
}
?><script>tot = <?php echo $meaningfulIP;?></script><?php
//socket_close($client);
//echo 'x';





?>
</tbody>
</table>
<p class="lead"> A Map to plot the available Servers</p>
<div id="map" style="height: 300px; width:300px;"></div>
</html>
</div>
