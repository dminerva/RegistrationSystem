<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Professor Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<?php include 'nav.php'; ?>

<div class="container">		
	<div class="row">
		<div class="col-sm-4">
			
				<a href="profViewCourses.php">View Courses</a>

		</div>
		<div class="col-sm-4">

				<a href="profViewAdvisees.php">View Advisees</a>

		</div>
		<div class="col-sm-4">

				<a href="viewTranscript.php">View Transcript</a>

		</div>
	</div>	
        <div class="row">
        		<div class="col-sm-4">

				<a href="assignGrades.php">Assign Grades</a>

		</div>
		<div class="col-sm-4">

				<a href="searchCourses.php">Search Catalog </a>

		</div>
		<div class="col-sm-4">

				<a href="attendance.php">Take Attendance </a>

		</div>
        </div>
        <div class="row">
                <div class="col-sm-4">
                      <a href="changePassword.php">Change password</a>  
                </div>
        </div>
		
</div>

</body>
</html>
