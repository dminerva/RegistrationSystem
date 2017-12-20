<?php
include 'connectDB.php';

$email = $_POST["email"];

$sql = "DELETE FROM student WHERE UserEmail='".$email."'";
$conn->query($sql);

$sql = "DELETE FROM user WHERE UserEmail='".$email."'";
$conn->query($sql);

$sql = "DELETE FROM studentmajor WHERE UserEmail='".$email."'";
$conn->query($sql);

$sql = "DELETE FROM studentminor WHERE UserEmail='".$email."'";
$conn->query($sql);

$sql = "DELETE FROM partime WHERE UserEmail='".$email."'";
$conn->query($sql);

$sql = "DELETE FROM fulltime WHERE UserEmail='".$email."'";
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
    <h2>Course Deleted</h2>
    <a href="adminDeleteStudent.php">Back</a>
</div>
</body>
</html>