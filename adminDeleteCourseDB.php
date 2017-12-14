<?php
include 'connectDB.php';

$courseID = $_POST["courseID"];

$sql = "DELETE FROM course WHERE CourseID='".$courseID."'";
$conn->query($sql);

$sql = "DELETE FROM prerequisite WHERE CourseID='".$courseID."'";
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
</div>
</body>
</html>