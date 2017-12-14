<!DOCTYPE html>
<html>
<head>
	<title>navbar</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#">Sunshine College</a>
   			</div>
   			<ul class="nav navbar-nav">
   				<li><a href="index.php">Home</a></li>
          <?php
          session_start();

          if (isset($_SESSION["loggedin"])) {
            $type = $_SESSION["loggedin"];

            if ($type == "fulltime" || $type == "parttime") {
              echo "<li class=active><a href=studentHome.php>Student Home</a></li>";
            } if ($type == "professor") {
              echo "<li class=active><a href=professorHome.php>Professor Home</a></li>";
            } if ($type == "research") {
              echo "<li class=active><a href=researchHome.php>Research Home</a></li>";
            } if ($type == "admin") {
              echo "<li class=active><a href=adminHome.php>Admin Home</a></li>";
            }            
          }
          ?>
   			</ul>
   			<ul class="nav navbar-nav navbar-right">
   				<!--<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
          <?php

          if (isset($_SESSION["loggedin"])) {
            echo "<li><a href=logout.php>Logout</a></li>";
          } else {
            echo "<li><a href=login.php>Login</a></li>";
          }

          ?>
   			</ul>	
   		</div>	
	</nav>
</body>
</html>

