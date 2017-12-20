<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Course</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
    <h2>Delete Course</h2>
    <form action="adminDeleteCourseDB.php" method="post">
        <div class="form-group">
            <label for="courseID">Course Name</label>
            <select class="form-control" name="courseID" id="courseID" required>
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
        <div class="form-group">
                <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure you want to delete?');">Submit</button>
                <button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
        </div>
    </form>
</div>
</body>
</html>