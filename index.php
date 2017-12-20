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
  <style>
  body{ 
           background-image: url("background.jpg");
           background-size: cover;
           
           
           
  }
  .row{
          border-radius: 25px;
          background: white;
          opacity:0.9;
          padding: 25px;
  }
  </style>
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
			<p>Sunshine College is proud of its reputation for producing fine young men and women, well prepared with the breadth of outlook and the essential learning skills they will need to become successful citizens in a rapidly changing global community.</p>
			<button type="button" class="btn btn-default btn-block" onclick="location.href='https://www.oldwestbury.edu/academics/registrar/catalogs';">View Courses</button>
		</div>
		<div class="col-sm-3">
  			<h2>Search Courses</h2>
  			<p> Our programs encourage the highest standard of achievement in every activity undertaken by our students. They focus on whole student development by embracing not only academic, sporting and artistic excellence, but also the building of self esteem, personal confidence, optimism for the future, and a strong sense of community responsibility. </p>
  			<button type="button" class="btn btn-default btn-block" onclick="location.href='searchCourses.php';" >Search Courses</button>
  		</div>
  		<div class="col-sm-3">
  			<h2>View Sections</h2>
  			<p>The friendly and supportive atmosphere at each campus is underpinned by a strong code of conduct, the wearing of school uniform, firm structures and clear expectations. In this positive environment students develop strong and constructive relationships with one another and with their teachers, as well as a sense of belonging to and being proud of their school. </p>
  			<button type="button" class="btn btn-default btn-block" onclick="location.href='viewSections.php';">View Sections</button>
  		</div>
		<div class="col-sm-3">
			<h2>Search Sections</h2>
			<p>At Sunshine College both our teaching and support staff are totally committed to assisting every student to reach their potential and become well educated, responsible young adults, fully prepared for the world beyond school where they will undertake university and other tertiary studies, further training, and employment. </p>
			<button type="button" class="btn btn-default btn-block" onclick="location.href='searchSections.php';">Search Sections</button>
		</div>
	</div>
</div>
</body>
</html>