<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>view transcript</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>
<div class="container">
        <h2>Transcript</h2>
        <p><?php echo $_SESSION["fName"]." ".$_SESSION["lName"]; ?></p>
        <?php
include 'connectDB.php';

$majorCount = 0;
$minorCount = 0;

$sql = "SELECT * FROM studentmajor AS sm
        LEFT JOIN major AS m ON m.MajorID = sm.MajorID
        WHERE sm.UserEmail='".$_SESSION["username"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $majorCount += 1;
        if($majorCount == 1) {
            echo "Major: ".$row["major_name"];
        } if($majorCount > 1) {
            echo ", ".$row["major_name"];
        }
    }
}

$sql = "SELECT * FROM studentminor AS sm
LEFT JOIN minor AS m ON m.MinorID = sm.MinorID
WHERE sm.UserEmail='".$_SESSION["username"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $majorCount += 1;
        if($majorCount == 1) {
            echo "Minor: ".$row["minor_name"];
        } if($majorCount > 1) {
            echo ", ".$row["minor_name"];
        }
    }
}
?>
        
	<table class="table">
		<thead>
			<tr>
				<th>Course</th><th>Credits</th><th>Department</th><th>Semester</th><th>Year</th><th>Grade</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'connectDB.php';

				$user = $_SESSION["username"];
				$credit = 0;
				$total = 0;
				$count = 0;

				$sql = "SELECT * FROM academicrecord AS ar
						LEFT JOIN course AS c ON ar.CourseID = c.CourseID
						LEFT JOIN semesteryear AS sy ON ar.SemesterYear = sy.SemesterYearID
						LEFT JOIN grade AS g ON g.grade_letter = ar.Grade
						WHERE ar.UserEmail='" . $user . "'";
				$result = $conn->query($sql);	
				
				if ($result->num_rows > 0)	{
					while ($row = $result->fetch_assoc()) {
						if($row["grade_letter"] != "I" || $row["grade_letter"] != "W") {
							$credit += $row["Credits"];
							$total += $row["value"];
							$count += 1;
						}			

						echo "<tr><td>" . $row["CourseName"] . "</td><td>" . $row["Credits"] . "</td><td>" . $row["DeptID"] . "</td><td>" . $row["Semester"] . "</td><td>" .
							 $row["Year"] . "</td><td>" . $row["Grade"] . "</td></tr>";
					}
				} else {
					echo "0 results";
				}								
			?>
		</tbody>
	</table>
	<?php			
	if($count > 0) {
		$avg = $total / $count;
		$gpa = ($avg / 100) * 4;
                $gpa = number_format($gpa,2,".",".");
		//echo $total." - ".$count." - ".$avg." - ".$gpa;

		echo "<p>Total Credits: ".$credit."</p>";
                echo "<p>GPA: ".$gpa."</p>";
	}
	?>
</div>
</body>
</html>