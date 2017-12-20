<?php
include 'connectDB.php';

$error = 0;
$msg = "";

$syID = $_POST["sem"];

$sql = "SELECT * FROM semesteryear WHERE SemesterYearID='".$syID."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row["current"] == 1) {
            $error = 1;
            $msg .= "selected is already the current semester";
        }
    }
}

if($error == 0) {
    $sql2 = "UPDATE semesteryear SET current=0 WHERE current=1";
    $conn->query($sql2);

    $sql3 = "UPDATE semesteryear SET current=1 WHERE SemesterYearID='".$syID."'";
    $conn->query($sql3);
}
?>

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
<?php
if($error == 0) {
    echo "<p>new semester set</p>";
    echo "<a href='adminSetSem.php'>Back</a>";
} else {
    echo "<p>".$msg."</p>";
}
?>
</div>
</body>
</html>