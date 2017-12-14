<?php
include 'connectDB.php';

$error = 0;
$msg = "";
$startH = $_POST["startH"];
$startM = $_POST["startM"];
$endH = $_POST["endH"];
$endM = $_POST["endM"];

$startTime = str_pad($startH, 2, '0', STR_PAD_LEFT).":".str_pad($startM, 2, '0', STR_PAD_LEFT).":00";
$endTime = str_pad($endH, 2, '0', STR_PAD_LEFT).":".str_pad($endM, 2, '0', STR_PAD_LEFT).":00";

if(strtotime($startTime) < strtotime($endTime)) {
    $sql = "SELECT * FROM timeslot WHERE Start='".$startTime."' AND End='".$endTime."'";

    $result = $conn->query($sql);
    
    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO timeslot (TimeSlotID, Start, End) VALUES (null, ?, ?)");
        $stmt->bind_param("ss", $thisStart, $thisEnd);
    
        $thisStart = $startTime;
        $thisEnd = $endTime;
    
        $stmt->execute();
    } else {
        $msg .= "time slot already exists";
        $error = 1;
    }
} else {
    $msg .= "start time must come before end time";
    $error = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Create timeslot</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
<?php
if($error == 1) {
    echo "<p>".$msg."</p>";
} else {
    echo "<h2>Time slot added</h2>";
}
?>
</div>
</body>
</html>