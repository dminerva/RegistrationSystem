<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Degree Audit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
    <form action="adminDegreeAuditDB.php" method="post">
        <div class="form-group">
            <label for="stu">Student</label>
            <select class="form-control" name="stu" id="stu" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';
                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row["UserEmail"].">".$row["FirstName"]." ".$row["LastName"]."</option>";
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