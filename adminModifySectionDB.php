<?php
include 'connectDB.php';

$error = 0;
$msg = "";
$count = 0;

$crn = $_POST["course"];

//get info that has been modified or get original info
if(isset($_POST["prof"]) || isset($_POST["day"]) || isset($_POST["time"]) || isset($_POST["room"]) || isset($_POST["sy"])) {
    $sql1 = "SELECT * FROM section AS s
            LEFT JOIN timeslot AS ts ON s.TimeSlot=ts.TimeSlotID
            LEFT JOIN day AS d ON d.day_id=s.Day
            WHERE CRN='".$crn."' ";   

    $result1 = $conn->query($sql1);
    
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            if(isset($_POST["prof"]) && $_POST["prof"] != "") {
                $count++;
                $prof = $_POST["prof"];
            } else {
                $prof = $row["prof_email"];
            }
            
            if(isset($_POST["day"]) && $_POST["day"] != "") {
                $count++;
                $day = $_POST["day"];
            } else {
                $day = $row["Day"];
                $propFDay = $row["day_one"];
                $propLDay = $row["day_two"];
            }
            
            if(isset($_POST["room"]) && $_POST["room"] != "") {
                $count++;
                $roomBuild = $_POST["room"];
                $result_explode = explode('|', $roomBuild);
                $room = $result_explode[0];
                $building = $result_explode[1];
            } else {
                $room = $row["RoomID"];
                $building = $row["BuildingID"];
                $seatSize = $row["MaxSeats"];

            }
            
            if(isset($_POST["sy"]) && $_POST["sy"] != "") {
                $count++;
                $semesterYear = $_POST["sy"];
            } else {
                $semesterYear = $row["SemesterYear"];
            }

            if(!isset($_POST["time"]) || $_POST["time"] == "") {
                $time = $row["TimeSlot"];
                $propStart = $row["Start"];
                $propEnd = $row["End"];
                //echo "prop start: ".$propStart." - prop end: ".$propEnd;
            }
        }
    }

    if(isset($_POST["time"]) && $_POST["time"] != "") {
        $count++;
        $time = $_POST["time"];

        $sql2 = "SELECT * FROM timeslot WHERE TimeSlotID='".$time."'";

        $result2 = $conn->query($sql2);
        
        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                $propStart = $row["Start"];
                $propEnd = $row["End"];
                //echo "prop start: ".$propStart." - prop end: ".$propEnd;
            }
        }
    }

    if(isset($_POST["day"]) && $_POST["day"] != "") {
        $sqlA = "SELECT * FROM day WHERE day_id='".$day."'";
        $resultA = $conn->query($sqlA);
        
        if ($resultA->num_rows > 0) {
            while($row = $resultA->fetch_assoc()) {
                $propFDay = $row["day_one"];
                $propLDay = $row["day_two"];
            }
        }
    }
}

//echo "prop start: ".$propStart." - prop end: ".$propEnd;

//echo "prof: ".$prof." - day: ".$day." - time: ".$propStart."-".$propEnd." - room: ".$room." - building: ".$building." - semester year: ".$semesterYear;

//check for room scheduling overlap
if(isset($_POST["day"]) || isset($_POST["time"]) || isset($_POST["room"]) || isset($_POST["sy"])) {
    $sql3 = "SELECT * FROM section AS s
            LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
            LEFT JOIN day AS d ON d.day_id=s.Day
            WHERE s.RoomID='".$room."' AND s.BuildingID='".$building."' AND s.SemesterYear='".$semesterYear."'";

    $result3 = $conn->query($sql3);

    //echo "query";

    if ($result3->num_rows > 0) {
        while($row = $result3->fetch_assoc()) {
            $schedStart = $row["Start"];
            $schedEnd = $row["End"];
            $schedFDay = $row["day_one"];
            $schedLDay = $row["day_two"];

            //echo "query";
            //echo "prop start: ".$propStart." - prop end: ".$propEnd;

            if( (strtotime($propStart) <= strtotime($schedStart) && strtotime($schedStart) <= strtotime($propEnd)) || (strtotime($schedStart) <= strtotime($propEnd) && strtotime($propEnd) <= strtotime($schedEnd)) && $crn != $row["CRN"] ) {
                if(isset($schedFDay) && isset($schedLDay)) {
                    if( ($propFDay != $schedFDay) || ($propFDay != $schedLDay) || ($propLDay != $schedLDay) || ($propLDay != $schedFDay) ) {
                        $error = 1;
                        $msg .= "room scheduling overlap";
                    } 
                } else {
                    $error = 1;
                    $msg .= "room scheduling overlap";
                }
            }
        }
    }
}

//prof scheduling overlap
if(isset($_POST["prof"])) {
    $sql4 = "SELECT * FROM section AS s
    LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
    LEFT JOIN day AS d ON d.day_id=s.Day
    WHERE s.SemesterYear='".$semesterYear."' AND s.prof_email='".$prof."'";

    //echo $prof;

    $result4 = $conn->query($sql4);

    if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
            $schedStart = $row["Start"];
            $schedEnd = $row["End"];
            $schedFDay = $row["day_one"];
            $schedLDay = $row["day_two"];

            if( (strtotime($propStart) <= strtotime($schedStart) && strtotime($schedStart) <= strtotime($propEnd)) || (strtotime($schedStart) <= strtotime($propEnd) && strtotime($propEnd) <= strtotime($schedEnd)) && $crn != $row["CRN"] ) {
                if( ($propFDay != $schedFDay) || ($propFDay != $schedLDay) || ($propLDay != $schedLDay) || ($propLDay != $schedFDay) ) {
                    $error = 1;
                    $msg .= "professor scheduling overlap";
                }               
            }
        }
    }
}

//get room type for seat number
if(isset($room)) {
    $sql5 = "SELECT * FROM room WHERE RoomID='".$room."' AND BuildingID='".$building."'";
    $result5 = $conn->query($sql5);
    
    if ($result5->num_rows > 0) {
        while($row = $result5->fetch_assoc()) {
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
}

if($count > 0 && $error == 0) {
    $sql = "UPDATE section SET ";

    if($count > 0 && isset($prof)) {
        $sql .= "prof_email='".$prof."'";
    }

    if($count == 1 && isset($day)) {
        $sql .= "Day='".$day."'";
    } elseif ($count > 1 && isset($day)) {
        $sql .= ", Day='".$day."'";
    }

    if($count == 1 && isset($time)) {
        $sql .= "TimeSlot='".$time."'";
    } elseif ($count > 1 && isset($time)) {
        $sql .= ", TimeSlot='".$time."'";
    }

    if($count == 1 && isset($room)) {
        $sql .= "RoomID='".$room."', BuildingID='".$building."', MaxSeats='".$seatSize."'";
    } elseif ($count > 1 && isset($room)) {
        $sql .= ", RoomID='".$room."', BuildingID='".$building."', MaxSeats='".$seatSize."'";
    }

    if($count == 1 && isset($semesterYear)) {
        $sql .= "SemesterYear='".$semesterYear."'";
    } elseif ($count > 1 && isset($semesterYear)) {
        $sql .= ", SemesterYear='".$semesterYear."'";
    }

    $sql .= "WHERE CRN='".$crn."'";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Modify Section</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
<?php
if($error == 0) {
    echo "<h2>Section Modified</h2>";
} else {
    echo "<h2>Section not modified</h2>";
    echo "<p>".$msg."</p>";
}
?>
</div> 
</body>
</html>
