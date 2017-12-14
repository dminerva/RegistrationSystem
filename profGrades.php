<html>
<head>
	<title>Assign Grades</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
<form action="gradesDB.php" method="post">			
		<?php include 'nav.php'; ?>
		<div class="form-group">
			<label for="userEmail">Student:</label>
			<select class="form-control" id="users" name="users">
			<option value=""></option>
			<?php

			include 'connectDB.php';
			$user = $_SESSION["username"];
			$CRN = $_SESSION["CRN"];
			$cid = $_SESSION["CourseID"];
			$sy = $_SESSION["SemesterYear"];
			$email = $_SESSION["UserEmail"];

			$sql = "SELECT * FROM Enrolled AS en
			LEFT JOIN section as sec ON sec.CRN = en.CRN 
			LEFT JOIN student AS stu ON stu.userEmail = en.userEmail
			 WHERE en.CRN ='".$CRN."'";


			//CRN Number en.CRN = POST Variable  
			

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$crn = $row['CRN'];
					$sy = $row["SemesterYear"];
					$_SESSION["SemesterYear"] = $sy;
					
					$userEm =  $row["userEmail"]; 
					echo "<option value='".$row["userEmail"]."'>".$row["FirstName"]." ".$row["LastName"]."</option>";
				}
				}
			
			?>

			</select>
		</div>
		<div class="form-group">
			<label for="Grade">Grade:</label>
			<select class="form-control" id="Grade" name="Grade">
				<option value="A">A</option>
				<option value="A-">A-</option>
				<option value="B+">B+</option>
				<option value="B">B</option>
				<option value="B-">B-</option>
				<option value="C+">C+</option>
				<option value="C">C</option>
				<option value="C-">C-</option>
				<option value="D+">D+</option>
				<option value="D">D</option>
				<option value="D-">D-</option>
				<option value="F">F</option>
				</select><br>
				

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