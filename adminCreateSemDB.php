<?php
include 'connectDB.php';

$error = 0;
$msg = "";
$semester = $_POST["sem"];
$year = $_POST["year"];

$sql = "SELECT * FROM semesteryear WHERE Year='".$year."' AND Semester='".$semester."'";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $stmt = $conn->prepare("INSERT INTO semesteryear (SemesterYearID, Year, Semester, start_date, end_date, current) VALUES (NULL, ?, ?, NULL, NULL, ?)");
    $stmt->bind_param("isi", $y, $s, $c);

    $y = $year;
    $s = $semester;
    $c = 2;

    $stmt->execute();
} else {
    $error = 1;
    $msg .= "semester already exists";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Semester</title>
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
    echo "<h2>Semester added</h2>";
} else {
    echo "<h2>Semester already exists</h2>";
}
?>
</div>
</body>
</html>