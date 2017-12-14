<?php
session_start();
include 'connectDB.php';

//SANITIZE INPUT
$user = $_POST["stu"];
$crn = $_POST["crn"];

$sql = "DELETE FROM enrolled WHERE UserEmail='".$user."' AND CRN='".$crn."'";

$conn->query($sql);

session_write_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Section</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <h2>Course Dropped</h2>
</div>    
</body>
</html>