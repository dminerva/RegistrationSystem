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
	<table class="table">
		<thead>
			<tr>
				<th>Course</th><th>Credits</th><th>Department</th><th>Semester</th><th>Year</th><th>Grade</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'connectDB.php';

				$user = $_POST["stu"];
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
		$avg = $total / $count;
		$gpa = ($avg / 100) * 4;
		//echo $total." - ".$count." - ".$avg." - ".$gpa;

		echo "<p>Total Credits: ".$credit." GPA: ".$gpa."</p>";
	?>
</div>
</body>
</html>