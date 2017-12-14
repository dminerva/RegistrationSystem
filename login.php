<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include 'nav.php';?>

<div class="container">
	<form class="form-horizontal" action="loginDB.php" method="post">
		<div class="form-group">
			<label class="control-label col-sm-2" for="email">Email:</label>
		 	<div class="col-sm-10">
    			<input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
  			</div>	
		</div>
		<div class="form-group">
  			<label class="control-label col-sm-2" for="password">Password:</label>
 			 <div class="col-sm-10">
    			<input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
  			</div>
		</div>
		<div class="form-group">        
  			<div class="col-sm-offset-2 col-sm-10">
    			<button type="submit" class="btn btn-default">Login</button>
  			</div>
		</div>	
	</form>	
</div>

</body>
</html>