<html>
<head>
	<title>Attendance </title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">	
  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	 <script>
  	$( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

</head>
<body>
<form action="attendanceTaken.php" method="post">			
		<?php 
		include 'nav.php'; 
		include 'connectDB.php';
		?>
		<div class="form-group">
			<label for="userEmail">Student:</label>
			<select class="form-control" id="users" name="users">
			<option value=""></option>
			<?php

			
			$user = $_SESSION["username"];
			$CRN = $_SESSION["CRN"];
			
			$sql = "SELECT * FROM Enrolled AS en
			LEFT JOIN section as sec ON sec.CRN = en.CRN 
			LEFT JOIN student AS stu ON stu.userEmail = en.userEmail
			LEFT JOIN day as day ON day.day_id = sec.Day
			LEFT JOIN SemesterYear as sy ON sy.SemesterYearID = sec.SemesterYear
			WHERE en.CRN ='".$CRN."'";



			//CRN Number en.CRN = POST Variable  
			

			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$crnNumber = $row["CRN"];
					$_SESSION["CRN"] = $crnNumber;
					//$userEmails = $row["UserEmail"]; 
					echo "<option value='".$row["UserEmail"]."'>".$row["FirstName"]." ".$row["LastName"]."</option>";
				}
				}
			
	
			?>
			</select>
		</div>
		
		<input type="date" name ="myDate" id="myDate" value = "2017-01-02" >

		<input type="radio" name="radio" value="True" required >Present
		<input type="radio" name="radio" value="False" >Absent
		
		<input type="hidden" id ="crnNumber" name="crnNumber" value = <?php echo $CRN ?>/>
				
		
		<div class="form-group">
			<button type="submit" class="btn btn-default">Search</button>
			<button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
		</div>
	</form>
</div>
</body>

</html>