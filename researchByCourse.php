<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Research By Course</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
<h2>Choose a course</h2>
<form>
    <div class="form-group">
        <label for="cname">Course Name:</label>
        <select class="form-control" id="course" name="course" onChange="getCourseData(this.value);" required>
        <option value=""></option>
        <?php
        include 'connectDB.php';

        $sql = "SELECT * FROM course";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["CourseID"]."'>".$row["CourseName"]."</option>";
            }
        }
        ?>
        </select>
    </div> 
</form>
<div id="course_data"></div>
</div>
</body>
</html>