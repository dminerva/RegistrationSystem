<?php
ob_start(); 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
body{
        
        background-image: url("campus.jpg");
        background-size: cover;
        background-repeat: no-repeat;
}
form {
    opacity: 0.9;
    width: 700px;
    border: 2px solid #f1f1f1; 
    padding: 10px;
    margin: 0 auto;
    background: #eaf2ff;
    border-radius: 25px;
}
.imgcontainer {
    text-align: center;
    margin: -34px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}
</style>

<?php include 'nav.php';?>

<div class="container">
	<form class="form-horizontal" action="loginDB.php" method="post">
		<div class="imgcontainer">
                    <img src="login.png" alt="Avatar" class="avatar">
                </div>
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
    			<button type="submit">Login</button>
  			</div>
		</div>	
	</form>	
</div>

</body>
</html>