<?php 
ob_start(); 
?>
<!DOCTYPE html>
<hmtl>
<head>
	<title>Student Home</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php include 'nav.php';?>
	<div class="container">
		<form class="form-horizontal" action="applyHoldDB.php" method="post">
    			<div class="form-group">
            <label for="student">Student</label>
            <select class="form-control" name="email" id="email" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["UserEmail"]."'>".$row["UserEmail"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
  			</div>
  			<div class="form-group">
    			<div class="col-sm-offset-2 col-sm-10">
      				<label class="radio-inline">
      					<input type="radio" name="hold" value="financial">Financial
    				</label>
    				<label class="radio-inline">
      					<input type="radio" name="hold" value="academic">Academic
    				</label>
    				<label class="radio-inline">
      					<input type="radio" name="hold" value="immunization">Immunization
    				</label>
    				<label class="radio-inline">
      					<input type="radio" name="hold" value="disciplinary">Disciplinary
    				</label>
            <label class="radio-inline">
                <input type="radio" name="hold" value="removehold">Remove all holds
            </label>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
    			</div>
  			</div>
		</form>
	</div>
</body>
</hmtl>
