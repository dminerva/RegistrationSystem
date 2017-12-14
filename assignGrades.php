<html>
<head>
	<title>Assign Grades</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>

<?php include 'nav.php';?>

<div class="container">
	<h2>Assign Grades</h2>
	<form action="grades.php" method="post">			
		<div class="form-group">
			<label for="cname">Course Name:</label>
			<select class="form-control" id="cname" name="cname">
			<option value=""></option>
			<?php

			include 'connectDB.php';
			$user = $_SESSION["username"];

			$sql = " SELECT * FROM section AS sec 
			LEFT JOIN Course AS c ON sec.CourseID = c.CourseID
			LEFT JOIN semesteryear AS sy ON sy.SemesterYearID = sec.SemesterYear 
			WHERE sy.current = 1 AND sec.prof_Email = '".$user."'";
			
			/*$sql ="SELECT * FROM Enrolled AS en
			LEFT JOIN section AS sec ON sec.CRN = en.CRN
			LEFT JOIN course AS c ON sec.CourseID = c.CourseID
			LEFT JOIN semesteryear AS sy ON sy.SemesterYearID = sec.SemesterYear 
			WHERE sy.Current = 1 AND sec.prof_Email = '".$user."'";
			*/
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$CRN = $row["CRN"];
					$_SESSION["CRN"] = $CRN;
					
					echo "<option value ='".$row["CourseID"]."'>".$row["CourseName"]."</option>";

				}
			}
			
			?>

			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Search</button>
			<button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
		</div>
	</form>
</div>
</body>
</html>