<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Research By Department</title>
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
<h2>Choose a Department</h2>
<form>
    <div class="form-group">
    <label for="dept">Department:</label>   
    <select class="form-control" name="dept" id="dept" onChange="getDeptData(this.value);" required>
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
</form> 
<hr>
<div id="dept_data"></div>  
</div>   
</body>
</html>