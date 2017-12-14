<!DOCTYPE html>
<html lang="en">
<head>
<title>Research By Major</title>
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
<h2>Choose a major</h2>
<form>
    <div class="form-group">
        <label for="major">Major:</label>
        <select class="form-control" id="major" name="major" onChange="getMajorData(this.value);" required>
        <option value=""></option>
        <?php
        include 'connectDB.php';

        $sql = "SELECT * FROM major";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["MajorID"]."'>".$row["major_name"]."</option>";
            }
        }
        ?>
        </select>
    </div> 
</form>
<hr>
<div id="major_data"></div>
</div>
</body>
</html>