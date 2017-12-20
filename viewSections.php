<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>sections</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include 'nav.php';?>

<div class="container">
<table class="table">
<thead>
	<tr>
		<th>Course</th><th>Course ID</th><th>CRN</th><th>Credits</th><th>Department</th><th>Subject</th><th>Professor</th><th>Days</th><th>Start Time</th><th>End Time</th><th>Room</th><th>Building</th><th>Semester</th><th>Year</th>
	</tr>
</thead>

<tbody>
	<?php
	include 'connectDB.php';
	
	$sql = "SELECT * FROM section AS s
			LEFT JOIN course AS c ON s.CourseID = c.CourseID
			LEFT JOIN professor AS p on s.prof_email = p.UserEmail
			LEFT JOIN day AS d ON d.day_id = s.Day
			LEFT JOIN timeslot AS ts on s.TimeSlot = ts.TimeSlotID
			LEFT JOIN building AS b on s.BuildingID = b.BuildingID
			LEFT JOIN semesteryear AS sy ON s.SemesterYear = sy.SemesterYearID
			LEFT JOIN department AS dept ON dept.DeptID = c.DeptID
			LEFT JOIN subject AS sub ON sub.subject_id = c.subject_id";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row["CourseName"]."</td><td>".$row["CourseID"]."</td><td>".$row["CRN"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"].
					"</td><td>".$row["subject_name"]."</td><td>".$row["LastName"]."</td><td>".$row["day_one"].", ".$row["day_two"]."</td><td>".$row["Start"]."</td><td>".
					$row["End"]."</td><td>".$row["RoomID"]."</td><td>".$row["build_name"]."</td><td>".$row["Semester"]."</td><td>".$row["Year"]."</td></tr>";
		}
	} else {
		echo "0 results";
	}
	?>
</tbody>
</table>
</div>

</body>
</html>