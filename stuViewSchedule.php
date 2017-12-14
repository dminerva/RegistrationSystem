<html>
<head>
<title>view schedule</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>

<div class="container">
<h2>Schedule</h2>

<table class="table">
<thead>	
    <tr>
        <th>Course</th><th>Course ID</th><th>CRN</th><th>Credits</th><th>Department</th><th>Subject</th><th>Professor</th><th>Days</th><th>Time</th>
        <th>Room</th><th>Building</th><th>Semester/Year</th>
    </tr>    
</thead>
<tbody>
<?php
include 'connectDB.php';

$sql = "SELECT * FROM enrolled AS e
        LEFT JOIN section AS s ON s.CRN = e.CRN
        LEFT JOIN course AS c ON c.CourseID = s.CourseID
        LEFT JOIN professor AS p ON p.UserEmail = s.prof_email
        LEFT JOIN department AS dept ON dept.DeptID = c.DeptID 
        LEFT JOIN subject as sub ON sub.subject_id = c.subject_id
        LEFT JOIN day AS d ON d.day_id = s.Day
        LEFT JOIN timeslot AS t ON t.TimeSlotID = s.TimeSlot
        LEFT JOIN building AS b ON b.BuildingID = s.BuildingID
        LEFT JOIN semesteryear AS sy ON sy.SemesterYearID = s.SemesterYear
        WHERE e.UserEmail ='".$_SESSION["username"]."' AND sy.SemesterYearID ='".$_POST["sy"]."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["CourseName"]."</td><td>".$row["CourseID"]."</td><td>".$row["CRN"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"]."</td><td>".$row["subject_name"].
                "</td><td>".$row["LastName"]."</td><td>".$row["day_one"].", ".$row["day_two"]."</td><td>".$row["Start"]." - ".$row["End"]."</td><td>".$row["room"]."</td><td>".
                $row["build_name"]."</td><td>".$row["Semester"]." ".$row["Year"]."</td></tr>";    
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