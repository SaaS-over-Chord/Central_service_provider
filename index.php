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
    	<img src="images/logo.png" style="width:12%;height:12%;" /><br />

   <h2>MNNIT SaaS Network welcomes you</h2>
	</div>
	<div class="form-group">
    <label for="firstName" class="col-sm-3 control-label">Search for software</label>
    <div class="col-sm-9">
        <form class="form-horizontal" method="get" action="dqdht.php">
            <input type="text"  name="query_field" placeholder="Enter your query" class="form-control" autofocus/>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
	</div>
    <div class="form-group">
    <label for="firstName" class="col-sm-3 control-label">Retrieve Cached Entries</label>
    <div class="col-sm-9">
        <form class="form-horizontal" method="get" action="retrieve.php">
            <input type="text"  name="query_field" placeholder="Enter your query" class="form-control" autofocus/>
            <button class="btn btn-info" type="submit">Submit</button>
        </form>
	</div>
    </div>
</html>
</div>