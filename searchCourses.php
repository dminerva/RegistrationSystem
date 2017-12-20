<?php ob_start(); ?>
<html lang="en">
<head>
<title>Search Courses</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>

<div class="container">
    <h2>Search Courses</h2>
    <form action="searchCoursesDB.php" method="post">
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
        <button type="submit" class="btn btn-default">Search</button>
        <button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
    </div>      
    </form>
</div>
</body>
</html>