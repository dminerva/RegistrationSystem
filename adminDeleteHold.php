<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Modify Student</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
    <h2>Delete Student Hold</h2>
    <form action="adminDeleteHoldDB.php" method="post">
        <div class="form-group">
            <label for="professor">Student Holds</label>
            <select class="form-control" name="email" id="email" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM holds";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["UserEmail"]."'>".$row["UserEmail"]." ".$row["HoldType"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure you want to delete?');">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
        </div>
    </form>
</div>
</body>
</html>