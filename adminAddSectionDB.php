<?php
ob_start();
include 'connectDB.php';

$error = 0;
$msg = "";
$course = $_POST["course"];
$prof = $_POST["prof"];
$day = $_POST["day"];
$time = $_POST["time"];
$roomBuild = $_POST["room"];
$result_explode = explode('|', $roomBuild);
$room = $result_explode[0];
$building = $result_explode[1];
$semesterYear = $_POST["sy"];

//make sure no scheduling overlap
$sql2 = "SELECT * FROM section
        WHERE Day='".$day."' AND TimeSlot='".$time."' AND RoomID='".$room."' AND BuildingID='".$building."' AND SemesterYear='".$semesterYear."'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $error = 1;
    $msg .= "scheduling overlap";
}

//make sure no prof not scheduled during this time
$sql4 = "SELECT * FROM section
        WHERE Day='".$day."' AND TimeSlot='".$time."' AND RoomID='".$room."' AND BuildingID='".$building."' AND SemesterYear='".$semesterYear."' AND prof_email='".$prof."'";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    $error = 1;
    $msg .= "professor scheduled for this time";
}



//get room type for seat number
$sql3 = "SELECT * FROM room WHERE RoomID='".$room."' AND BuildingID='".$building."'";
$result3 = $conn->query($sql3);

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {
        $type = $row["room_type"];

        if($type == "lab") {
            $seatSize = 20;
        } elseif($type == "lecture") {
            $seatSize = 30;
        } else {
            $seatSize = 20;
        }
    }
}

if($error == 0) {
    $stmt = $conn->prepare("INSERT INTO section (CRN, CourseID, prof_email, Day, TimeSlot, RoomID, BuildingID, SemesterYear, MaxSeats) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi", $c, $p, $d, $t, $r, $b, $sem, $seat);
    
    $c = $course;
    $p = $prof;
    $d = $day;
    $t = $time;
    $r = $room;
    $b = $building;
    $sem = $semesterYear;
    $seat = $seatSize;

    $stmt->execute();
}
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
<?php
if($error == 0) {
    echo "<h2>Section Added</h2>";
} else {
    echo "<h2>Section not added</h2>";
    echo "<p>".$msg."</p>";
}
?>
<a href="adminAddSection.php">Back</a>
</div>
</body>
</html>