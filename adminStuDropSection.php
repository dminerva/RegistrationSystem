<!DOCTYPE html>
<html>
<head>
<title>Drop Student from Classes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include "nav.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12"><img src="sunshinelogo.png" class="img-responsive center-block" alt="sunshinelogo"></div>
    </div>
    <form class="form-inline" action="adminStuDropSectionDB.php" method="post">
        <h3 class="text-center">Select student and input CRN of course you wish to drop them from</h3>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
                <div class="form-group">
                    <label for="stu">Student:</label>
                    <select class="form-control" id="stu" name="stu">
                    <option value=""></option>
                    <?php
                    include 'connectDB.php';

                    $sql = "SELECT * FROM student";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='".$row["UserEmail"]."'>".$row["FirstName"]." ".$row["LastName"]."</option>";
                        }
                    }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
                <div class="form-group">
                    <input type="number" id="crn" placeholder="Enter CRN" name="crn" required>
                </div>     
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button> 
                    <button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>                    
                </div>     
            </div>
        </div>
    </form>
</div>
</body>
</html>