<?php 
ob_start(); 
?>
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
<h2>View Student Schedule</h2>
<div class="form-group">
  <form action="adminStuScheduleDB.php" method="post">
  <label class="control-label col-sm-2" for="email">Student ID:</label>
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
        <label for="sy">Year</label>
            <select class="form-control" name="sy" id="sy" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM semesteryear WHERE (current=1 OR current=2)";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["SemesterYearID"]."'>".$row["Year"]." ".$row["Semester"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
</div>

<div class="col-sm-10">
  <input type="submit" value="Submit" />
  <input type="reset" value="Clear" />
</div>
</form>


</div>
</body>
</html>
