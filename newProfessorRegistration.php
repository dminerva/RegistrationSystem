<!DOCTYPE html>
<html>
<head>
	<title>New Student Registration</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'nav.php';?>
	<div class="container"> 
		<form class="form-horizontal" method="post" action="newProfessorRegistrationDB.php">
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="email">Email:</label>
    			<div class="col-sm-10">
      				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="pwd">Password:</label>
    			<div class="col-sm-10"> 
      				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
    			</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="fname">First Name:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
   				</div>
  			</div>
  			<div class="form-group">
    			<label class="control-label col-sm-2" for="lname">Last Name:</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
   				</div>
  			</div>
  			<div class="form-group">
            <label for="dept">Department:</label>
            <select class="form-control" name="dept" id="dept" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM department";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["DeptID"]."'>".$row["dept_name"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="bldg">Building:</label>
            <select class="form-control" name="bldg" id="bldg" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM building";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["BuildingID"]."'>".$row["build_name"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="room">Room number:</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="room" name="room" placeholder="Office Room# ">
          </div>
        </div>  
        <div class="form-group">
          <label class="control-label col-sm-2" for="office_hours">Office hour(s):</label>
          <div class="col-sm-10">
          <select class="form-control" name="office_hours" id="office_hours" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
          </select>
          </div>
        </div>   
        <div class="form-group">
          <label class="control-label col-sm-2" for="office_days">Office day(s):</label>
          <div class="col-sm-10">
          <select class="form-control" name="office_days" id="office_days" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
          </select>
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
