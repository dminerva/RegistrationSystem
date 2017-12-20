<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>New Student Registration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'nav.php'; ?>
	<h3>Add Student</h3>
  <div class="container"> 
		<form class="form-horizontal" method="post" action="newStudentRegistrationDB.php">
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="email">Email:</label>
    			<div class="col-sm-10">
      				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="pwd">Password:</label>
    			<div class="col-sm-10"> 
      				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required>
    			</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="fname">First Name:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" required>
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="lname">Last Name:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" required>
   				</div>
  			</div>
  			<div class="form-group">
            <label for="major">Major</label>
            <select class="form-control" name="major" id="major" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM major";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["MajorID"]."'>".$row["major_name"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
  			<div class="form-group">
            <label for="minor">Minor</label>
            <select class="form-control" name="minor" id="minor">
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM minor";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["MinorID"]."'>".$row["minor_name"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
  			<div class="form-group">
            <label for="advisor">Advisor</label>
            <select class="form-control" name="advisor" id="advisor" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM professor";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["UserEmail"]."'>".$row["LastName"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
  			<div class="form-group"> 
    			<div class="col-sm-offset-2 col-sm-10">
      				<label class="radio-inline">
      					<input type="radio" name="status" id='status' value="parttime">Part Time
    				</label>
    				<label class="radio-inline">
      					<input type="radio" name="status" id='status' value="fulltime">Full Time
    				</label>
    			</div>
  			</div>
  			<div class="form-group"> 
    			<div class="col-sm-offset-2 col-sm-10">
      				<button type="submit" class="btn btn-default">Submit</button>
    			</div>
        </div>
      </form>
    </div>
  </body>
  </html>
  