<html lang="en">
<head>
<title>Document</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container">
<form action="stuViewSchedule.php" method="post">
<div class="form-group">
    <label for="sy"></label>
    <select name="sy" id="sy" class="form-control">
    <?php
    include 'connectDB.php';

    $sql = "SELECT * FROM semesteryear";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value=".$row["SemesterYearID"].">".$row["Semester"]." ".$row["Year"]."</option>";
        }
    }
    ?>
    </select>    
</div>  
<div class="form-grou">
    <button type="submit" class="btn btn-default">Submit</button>    
</div>  
</form>   
</div>
</body>
</html>