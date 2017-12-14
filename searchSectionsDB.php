<html>
<head>
<title>search sections</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>

<div class="container">
<h2>Search Sections</h2>

<table class="table">
<thead>
	<tr>
		<th>Course</th><th>Course ID</th><th>CRN</th><th>Credits</th><th>Department</th><th>Subject</th><th>Professor</th><th>Days</th><th>Start Time</th><th>End Time</th><th>Room</th><th>Building</th><th>Semester</th><th>Year</th>
	</tr>
</thead>
<tbody>
<?php
include 'connectDB.php';

$count = 0;

$sql = "SELECT * FROM section AS s
		LEFT JOIN course AS c ON s.CourseID = c.CourseID
		LEFT JOIN professor AS p on s.prof_email = p.UserEmail
		LEFT JOIN day AS d ON d.day_id = s.Day
		LEFT JOIN timeslot AS ts on s.TimeSlot = ts.TimeSlotID
		LEFT JOIN semesteryear AS sy ON s.SemesterYear = sy.SemesterYearID
		LEFT JOIN department AS dept ON dept.DeptID = c.DeptID
		LEFT JOIN subject AS sub ON sub.subject_id = c.subject_id
		LEFT JOIN building AS b on s.BuildingID = b.BuildingID";

if(isset($_POST['cname']) && $_POST['cname'] != "") {
	$count +=1;

	if ($count == 1) {
		$sql .= " WHERE c.CourseName='".$_POST['cname']."'";
	}
} if (isset($_POST['cid']) && $_POST['cid'] != "") {
	$count +=1;

	if ($count == 1) {
		$sql .= " WHERE c.CourseID='".$_POST['cid']."'";
	} elseif ($count > 1) {
		$sql .= " AND c.CourseID='".$_POST['cid']."'";
	}
} if (isset($_POST['crn']) && $_POST['crn'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE s.CRN='".$_POST['crn']."'";
	} elseif ($count > 1) {
		$sql .= " AND s.CRN='".$_POST['crn']."'";
	}	
} if (isset($_POST['dept']) && $_POST['dept'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE dept.dept_name='".$_POST['dept']."'";
	} elseif ($count > 1) {
		$sql .= " AND dept.dept_name='".$_POST['dept']."'";
	}
} if (isset($_POST['sub']) && $_POST['sub'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE sub.subject_name ='".$_POST['sub']."'";
	} elseif ($count > 1) {
		$sql .= " AND sub.subject_name ='".$_POST['sub']."'";
	}
} if (isset($_POST['prof']) && $_POST['prof'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE p.LastName='".$_POST['prof']."'";
	} elseif ($count > 1) {
		$sql .= " AND p.LastName='".$_POST['prof']."'";
	}
} if (isset($_POST['day']) && $_POST['day'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE d.day_id='".$_POST['day']."'";
	} elseif ($count > 1) {
		$sql .= " AND d.day_id='".$_POST['day']."'";
	}
} if (isset($_POST['time']) && $_POST['time'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE ts.TimeSlotID='".$_POST['time']."'";
	} elseif ($count > 1) {
		$sql .= " AND ts.TimeSlotID='".$_POST['time']."'";
	}
} if (isset($_POST['sy']) && $_POST['sy'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE sy.SemesterYearID='".$_POST['sy']."'";
	} elseif ($count > 1) {
		$sql .= " AND sy.SemesterYearID='".$_POST['sy']."'";
	}
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>".$row["CourseName"]."</td><td>".$row["CourseID"]."</td><td>".$row["CRN"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"]."</td><td>".
				$row["subject_name"]."</td><td>".$row["LastName"]."</td><td>".$row["day_one"].", ".$row["day_two"]."</td><td>".$row["Start"]."</td><td>".$row["End"].
				"</td><td>".$row["RoomID"]."</td><td>".$row["build_name"]."</td><td>".$row["Semester"]."</td><td>".$row["Year"]."</td></tr>";		
	}
} else {
	echo "no results";
}
?>
</tbody>
</table>	
</div>
</body>
</html>