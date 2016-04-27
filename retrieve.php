<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

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
socket_close($client);


?>
</html>
</div>
