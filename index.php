<?php
include 'connectDB.php';

/*$sql = "SELECT * FROM semesteryear
        WHERE current = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //echo $row["Semester"]." ".$row["Year"];
        //echo $thisS." ".$thisY;       
        $_SESSION["current"] = $row["SemesterYearID"];

        if($row["Semester"] == "Winter") {
            $_SESSION["next"] = "Spring";
        } if($row["Semester"] == "Spring") {
            $_SESSION["next"] = "Summer";
        } if($row["Semester"] == "Summer") {
            $_SESSION["next"] = "Fall"; 
        } if($row["Semester"] == "Fall") {
            $_SESSION["nextS"] = $nextS;
            $_SESSION["nextY"] = $nextY;
        }
    } 
}*/
?>

<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
include 'nav.php';

/*$today = date("Y-m-d");
$date = "2016-01-21";

if($today > $date) {
	echo $today." ".$date;
}*/


?>

<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<img src="sunshinelogo.png" class="img-responsive" alt="sunshinelogo">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3">
			<h2>View Courses</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<button type="button" class="btn btn-default btn-block" ><a href="https://www.oldwestbury.edu/academics/registrar/catalogs">View Courses</a></button>
		</div>
		<div class="col-sm-3">
  			<h2>Search Courses</h2>
  			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  			<button type="button" class="btn btn-default btn-block" ><a href="searchCourses.php">Search Courses</a></button>
  		</div>
  		<div class="col-sm-3">
  			<h2>View Sections</h2>
  			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  			<button type="button" class="btn btn-default btn-block"><a href="viewSections.php">View Sections</a></button>
  		</div>
		<div class="col-sm-3">
			<h2>Search Sections</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<button type="button" class="btn btn-default btn-block"><a href="searchSections.php">Search Sections</a></button>
		</div>
	</div>
</div>
</body>
</html>