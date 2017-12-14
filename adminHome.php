<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<a href='newStudentRegistration.php'>Create New Student Account</a>
		</div>
		<div class="col-sm-4">
			<a href=''>Degree Audit</a>
		</div>
		<div class="col-sm-4">
			<a href='applyHold.php'>Holds</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<a href='newProfessorRegistration.php'>Create New Professor Account</a>
		</div>
		<div class="col-sm-4">
			<a href="adminStuLookup.php">Search Student Info</a>
		</div>
		<div class="col-sm-4">
			<a href="adminStuSchedule.php">View Student Schedule</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<a href="adminAddCourse.php">Add Course</a>
		</div>
		<div class="col-sm-4">
			<a href="adminModifyCourse.php">Modify Course</a>
		</div>
		<div class="col-sm-4">
			<a href="adminDeleteCourse.php">Delete Course</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<a href="adminAddSection.php">Add Section</a>
		</div>
		<div class="col-sm-4">
			<a href="adminModifySection.php">Modify Section</a>
		</div>
		<div class="col-sm-4">
			<a href="adminDeleteSection.php">Delete Section</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<a href="adminCreateTimeSlot.php">Create timeslot/day combination</a>
		</div>
		<div class="col-sm-4">
			<a href="adminStuAddSection.php">Register student</a>
		</div>
		<div class="col-sm-4">
			<a href="adminStuDropSection.php">Drop student</a>
		</div>
	</div>
</div>
</body>
</html>
