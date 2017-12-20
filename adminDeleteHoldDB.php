<?php
include 'connectDB.php';

$email = $_POST["email"];

$sql = "DELETE FROM holds WHERE UserEmail='".$email."'";
$conn->query($sql);


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
    <h2>Hold Deleted Success</h2>
    <a href="adminDeleteHold.php">Back</a>
</div>
</body>
</html>