<!DOCTYPE html>
<html>
<head>
	<title>Student Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
<?php include 'nav.php'; ?>

<div class="container">
	<h3><?php echo $_SESSION["fName"]." ".$_SESSION["lName"]; ?></h3>		
	<div class="row">
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="https://www.oldwestbury.edu/academics/registrar/catalogs">View Courses</a>
			</button>
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="viewSections.php">View Sections</a>
			</button>
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="searchSections.php">Search Sections</a>
			</button>
		</div>
	</div>	
	<div class="row">
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="searchCourses.php">Search Courses</a>
			</button>
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="stuDropSection.php">Drop Course</a>
			</button>
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="stuViewAdvisor.php">View Advisor</a>
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="stuChooseSchedule.php">View Schedule</a>
			</button>
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="stuViewTranscript.php">View Transcript</a>
			</button>
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block" >
				<a href="stuDegreeAudit.php">View Degree Audit</a>
			</button>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<button type="button" class="btn btn-default btn-block">				
				<a href="stuAddSection.php">Add Course</a>
			</button>
		</div>
	</div>	
</div>

</body>
</html>