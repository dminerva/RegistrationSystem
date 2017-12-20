<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Researcher Registration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'nav.php';?>
	<div class="container"> 
		<form class="form-horizontal" method="post" action="newResearchRegistrationDB.php">
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="email">Email:</label>
    			<div class="col-sm-10">
      				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="pwd">Password:</label>
    			<div class="col-sm-10"> 
      				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    			</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="fname">First Name:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="lname">Last Name:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
   				</div>
  			</div>
  		<div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-10">
      			<button type="submit" class="btn btn-default">Submit</button>
    		</div>
  		</div>
	</form>
	</div>
</body>
</html>