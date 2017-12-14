<!DOCTYPE html>
<html>
<head>
	<title>New Course Registration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'nav.php';?>
	<div class="container"> 
		<form class="form-horizontal">
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="courseID">CourseID:</label>
    			<div class="col-sm-10">
      				<input type="number" class="form-control" id="courseID" placeholder="Enter courseID">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="courseName">Course Name:</label>
    			<div class="col-sm-10"> 
      				<input type="text" class="form-control" id="courseName" placeholder="Enter Course Name">
    			</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="dept">Department:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="dept" placeholder="Enter Dept. ID">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="credits">Credits:</label>
    			<div class="col-sm-10">
      				<input type="number" class="form-control" id="credits" placeholder="Enter Credits">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="prereq">Prerequisite:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="prereq" placeholder="Enter Prereq. ID">
   				</div>
  			</div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="subject">Subject:</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="subject" placeholder="Enter Subject ID">
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
