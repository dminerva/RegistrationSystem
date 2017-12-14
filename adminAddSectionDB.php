<?php
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

//get time
$sql1 = "SELECT * FROM timeslot WHERE TimeSlotID='".$time."'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $propStart = $row["Start"];
        $propEnd = $row["End"];        
    }
}

//get day
$sqlA = "SELECT * FROM day WHERE day_id='".$day."'";
$resultA = $conn->query($sqlA);

if ($resultA->num_rows > 0) {
    while($row = $resultA->fetch_assoc()) {
        $propFDay = $row["day_one"];
        $propLDay = $row["day_two"];
        //echo "propF: ".$propFDay." - propE: ".$propLDay;
    }
}

//make sure no scheduling overlap
/*$sql2 = "SELECT * FROM section AS s
        LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
        WHERE s.Day='".$day."' AND ts.Start='".$startTime."' AND ts.End='".$endTime."' AND s.RoomID='".$room."' AND s.BuildingID='".$building."' AND s.SemesterYear='".$semesterYear."'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $error = 1;
    $msg .= "scheduling overlap";
}*/
//echo "day: ".$day." - room: ".$room." - build: ".$building." - sy: ".$semesterYear;
/*$sql2 = "SELECT * FROM section AS s
        LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
        WHERE s.Day='".$day."' AND s.RoomID='".$room."' AND s.BuildingID='".$building."' AND s.SemesterYear='".$semesterYear."'";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        $schedStart = $row["Start"];
        $schedEnd = $row["End"];

        //echo "result";

        if( (strtotime($propStart) <= strtotime($schedStart) && strtotime($schedStart) <= strtotime($propEnd)) || (strtotime($schedStart) <= strtotime($propEnd) && strtotime($propEnd) <= strtotime($schedEnd)) ) {
            $error = 1;
            $msg .= "scheduling overlap";
        }
    }
}*/

$sql2 = "SELECT * FROM section AS s
LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
LEFT JOIN day AS d ON d.day_id=s.Day
WHERE s.RoomID='".$room."' AND s.BuildingID='".$building."' AND s.SemesterYear='".$semesterYear."'";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        $schedStart = $row["Start"];
        $schedEnd = $row["End"];
        $schedFDay = $row["day_one"];
        $schedLDay = $row["day_two"];

        //echo "result";
        //echo "propF: ".$propFDay." - propE: ".$propLDay." - schedF: ".$schedFDay." - schedE: ".$schedLDay;

        if( (strtotime($propStart) <= strtotime($schedStart) && strtotime($schedStart) <= strtotime($propEnd)) || (strtotime($schedStart) <= strtotime($propEnd) && strtotime($propEnd) <= strtotime($schedEnd)) ) {
            if( ($propFDay != $schedFDay) || ($propFDay != $schedLDay) || ($propLDay != $schedLDay) || ($propLDay != $schedFDay) ) {
                $error = 1;
                $msg .= "scheduling overlap";
            }      
        }
    }
}

//echo "working";

//make sure no prof not scheduled during this time
/*$sql4 = "SELECT * FROM section AS s
        LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
        WHERE s.Day='".$day."' AND ts.Start='".$startTime."' AND ts.End='".$endTime."' AND s.SemesterYear='".$semesterYear."' AND s.prof_email='".$prof."'";
$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    $error = 1;
    $msg .= "professor scheduled for this time";
}*/

//echo "sy: ".$semesterYear." - prof: ".$prof;

$sql4 = "SELECT * FROM section AS s
        LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
        LEFT JOIN day AS d ON d.day_id=s.Day
        WHERE s.SemesterYear='".$semesterYear."' AND s.prof_email='".$prof."'";

$result4 = $conn->query($sql4);

if ($result4->num_rows > 0) {
    while($row = $result4->fetch_assoc()) {
        $schedStart = $row["Start"];
        $schedEnd = $row["End"];
        $schedFDay = $row["day_one"];
        $schedLDay = $row["day_two"];

        //echo "test";

        if( (strtotime($propStart) <= strtotime($schedStart) && strtotime($schedStart) <= strtotime($propEnd)) || (strtotime($schedStart) <= strtotime($propEnd) && strtotime($propEnd) <= strtotime($schedEnd)) ) {
            if( ($propFDay != $schedFDay) || ($propFDay != $schedLDay) || ($propLDay != $schedLDay) || ($propLDay != $schedFDay) ) {
                $error = 1;
                $msg .= "professor scheduled for this time";
            }         
        }
    }
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
</div>
</body>
</html>