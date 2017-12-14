<?php
session_start();
include 'connectDB.php';

$hold = 0;

$sql = "SELECT * FROM holds
        WHERE UserEmail='".$_SESSION["username"]."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $holdType = $row["HoldType"]; 
    }
    $hold = 1;
}  
session_write_close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Register for Classes</title>
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
    <form class="form-inline" action="stuAddSectionDB.php" method="post">
        <h3 class="text-center">
        <?php
        if($hold == 0) {
            echo "Enter the CRN of courses you wish to register for";
        } elseif($hold == 1) {
            echo "Can not register for courses while there is an active ".$holdType." hold";
        }
        ?>
        </h3>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
                <input type="number" id="crn" placeholder="Enter CRN" name="crn" <?php if($hold == 1){ echo "disabled"; } ?> required>
            </div>        
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
                <button type="submit" class="btn btn-default">Submit</button> 
                <button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
            </div>            
        </div>
    </form>
</div>
</body>
</html>