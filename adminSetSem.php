<!DOCTYPE html>
<html lang="en">
<head>
<title>Set Semester</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <h4>Select the semester you wish to set to current</h4>
    <form action="adminSetSemDB.php" method="post">
        <div class="form-group">
            <label for="sem">Semester/Year</label>
            <select class="form-control" name="sem" id="sem" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM semesteryear";

                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["SemesterYearID"]."'>".$row["Semester"]." ".$row["Year"]."</option>";
                    }
                }
                ?>
            </select>
            
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>
</div>
</body>
</html>