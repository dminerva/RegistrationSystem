<?php ob_start(); ?>
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
	<h2>Search sections</h2>
	<form action="searchSectionsDB.php" method="post">
		<div class="form-group">
			<label for="cname">Course Name:</label>
			<select class="form-control" id="cname" name="cname">
			<option value=""></option>
			<?php
			include 'connectDB.php';

			$sql = "SELECT CourseName FROM course";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["CourseName"]."'>".$row["CourseName"]."</option>";
				}
			}
			?>
			</select>
		</div>
		<div class="form-group">
			<label for="cid">Course ID:</label>
			<select class="form-control" id="cid" name="cid">
			<option value=""></option>
			<?php
			$sql = "SELECT CourseID FROM course";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["CourseID"]."'>".$row["CourseID"]."</option>";
				}
			}			
			?>
			</select>
		</div>
		<div class="form-group">
			<label for="crn">CRN:</label>
			<select class="form-control" id="crn" name="crn">
			<option value=""></option>
			<?php
			$sql = "SELECT CRN FROM section";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["CRN"]."'>".$row["CRN"]."</option>";
				}
			}
			?>
			</select>
		</div>		
		<div class="form-group">
			<label for="dept">Department:</label>
			<select class="form-control" id="dept" name="dept">
			<option value=""></option>
			<?php
			$sql = "SELECT dept_name FROM department";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["dept_name"]."'>".$row["dept_name"]."</option>";
				}
			}
			?>
			</select>
		</div>
		<div class="form-group">
			<label for="sub">Subject:</label>
			<select class="form-control" id="sub" name="sub">
			<option value=""></option>
			<?php
			$sql = "SELECT subject_name FROM subject";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["subject_name"]."'>".$row["subject_name"]."</option>";
				}
			}			
			?>	
			</select>
		</div>
		<div class="form-group">
			<label for="prof">Professor:</label>
			<select class="form-control" id="prof" name="prof">
			<option value=""></option>
			<?php
			$sql = "SELECT LastName FROM professor";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["LastName"]."'>".$row["LastName"]."</option>";
				}
			}			
			?>	
			</select>
		</div>
		<div class="form-group">
			<label for="dept">Day:</label>
			<select class="form-control" id="day" name="day">
			<option value=""></option>
			<?php
			$sql = "SELECT * FROM day";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["day_id"]."'>".$row["day_one"].", ".$row["day_two"]."</option>";
				}
			}			
			?>	
			</select>
		</div>
		<div class="form-group">
			<label for="time">Time:</label>
			<select class="form-control" id="time" name="time">
			<option value=""></option>
			<?php
			$sql = "SELECT * FROM timeslot";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["TimeSlotID"]."'>".$row["Start"]." - ".$row["End"]."</option>";
				}
			}			
			?>	
			</select>
		</div>
		<div class="form-group">
			<label for="sy">Semester/Year:</label>
			<select class="form-control" id="sy" name="sy">
			<option value=""></option>
			<?php
			$sql = "SELECT * FROM semesteryear";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<option value='".$row["SemesterYearID"]."'>".$row["Semester"]." ".$row["Year"]."</option>";
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