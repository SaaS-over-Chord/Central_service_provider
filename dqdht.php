<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<script src="js/jquery-1.11.1.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<?php

header( "refresh:5;url=index.php" );

?>
<div class="alert alert-warning" role="alert">Going to be redirected to home page</div>
<div class="container">
<html>
	<br>
<br>
<br>
	
	<div class="jumbotron">
    <img src="images/logo.png" style="width:12%;height:12%;" />
      <h2>MNNIT SaaS Network welcomes you</h2>
	</div>
    
    <p class="lead"> Your Query was submitted into the network, use retrieve to fetch results. </p>
<?php
$addr="127.0.0.1";

$client= stream_socket_client("tcp://$addr:1069",$errno,$errormessage);


if($client === false)
	echo "failed in socket creation";
$query = "dqdht -key ".$_GET['query_field']."\n";

fwrite($client,$query);
fflush($client);

$c=stream_get_contents($client,400,0);
echo $c;
socket_close($client);


?>
</html>
</div>