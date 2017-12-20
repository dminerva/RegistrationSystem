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
		<th>Course</th><th>CRN</th><th>Credits</th><th>Professor</th><th>Days</th><th>Start Time</th><th>End Time</th><th>Room</th><th>Building</th><th>Semester</th><th>Year</th>
	</tr>
</thead>

<tbody>
	<?php
	include 'connectDB.php';

	$sql = "SELECT 
			* 
			FROM 
			section AS s 
			LEFT JOIN 
			course AS c 
			ON 
			s.CourseID = c.CourseID 
			LEFT JOIN 
			timeslot AS t 
			ON 
			t.TimeslotID = s.Timeslot
			LEFT JOIN
			SemesterYear AS sy
			ON s.SemesterYear = sy.SemesterYearID";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
			$crn = $row["CRN"];
			$cID = $row["CourseID"];
			$credits = $row["Credits"];
			$prof = $row["Professor"];
			$day = $row["Day"];
			$tS = $row["TimeSlot"];
			$room = $row["RoomID"];
			$build = $row["BuildingID"];
			$sY = $row["SemesterYear"];
			$semester = $row["Semester"];
			$year = $row["Year"];
			$ms = $row["MaxSeats"];
			$cN = $row["CourseName"];
			$start = $row["Start"];
			$end = $row["End"];

			echo "<tr><td>" . $cN . "</td><td>" . $crn . "</td><td>" . $credits . "</td><td>" . $prof . "</td><td>" . $day . "</td><td>" . $start . "</td><td>" . $end . "</td><td>" . $room . "</td><td>" . $build . "</td><td>" . $semester . "</td><td>" . $year . "</tr>";
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