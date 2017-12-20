<?php
ob_start();
?>
<html>
<head>
	<title>View Transcript</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>

<?php include 'nav.php';?>

<div class="container">
	<h2>View Transcript</h2>
	<form action="transcript.php" method="post">			
		<div class="form-group">
			<label for="cname">Students:</label>
			<select class="form-control" id="userEmails" name="userEmails">
			<option value=""></option>
			<?php
				include 'connectDB.php';

				$sql = "SELECT * FROM advisor as a 
				LEFT JOIN student as stu ON a.StudentEmail = stu.UserEmail";
				$result = $conn->query($sql); 

				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) {

					// Make post variable on another page 
					echo "<option value='".$row["UserEmail"]."'>".$row["FirstName"]." ".$row["LastName"]."</option>";
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