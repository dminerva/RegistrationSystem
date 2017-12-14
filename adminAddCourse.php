<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Course</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
    <h2>Add Course</h2>
    <form action="adminAddCourseDB.php" method="post">
        <div class="form-group">
            <label for="courseName">Course Name</label>
            <input type="text" class="form-control" name="courseName" id="courseName" required>
        </div>
        <div class="form-group">
            <label for="creditAmt">Credits</label>
            <select class="form-control" name="creditAmt" id="creditAmt" required>
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div class="form-group">
            <label for="dept">Department</label>
            <select class="form-control" name="dept" id="dept" onChange="getDept(this.value);" required>
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
            <label for="sub">Subject</label>
            <select class="form-control" name="sub" id="sub" required>
                <option value=""></option>
            </select>
        </div>
        <div class="form-group">
            <label for="pre">Pre Requisite</label>
            <select class="form-control" name="pre" id="pre">
                <option value=""></option>
                <?php
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
                <button type="submit" class="btn btn-default">Submit</button>
                <button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
        </div>
    </form>
</div>
</body>
</html>