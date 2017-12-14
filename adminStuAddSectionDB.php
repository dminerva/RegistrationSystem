<?php
session_start();
include 'connectDB.php';

$user = $_POST["stu"];
$crn = $_POST["crn"];
$msg = "";
$error = 0;
$curCredits = 0;
$seatCount = 0;
$check = 0;

//get credit limit
$sql1 = "SELECT * FROM user WHERE UserEmail='".$user."'";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $type = $row["Type"];
    }
}

if($type == "fulltime") {
    $sqla = "SELECT * FROM fulltime";
} elseif($type == "parttime") {
    $sqla = "SELECT * FROM parttime";
}

$resulta = $conn->query($sqla);

if ($resulta->num_rows > 0) {
    while($row = $resulta->fetch_assoc()) {
        $maxCredits = $row["CreditLim"];
        //echo $maxCredits;
    }
}

//get next semester
$sql2 = "SELECT * FROM semesteryear
        WHERE current='1'";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
while($row = $result2->fetch_assoc()) {
    $year = $row["Year"];
        //echo "current year: ".$year;
    $semester = $row["Semester"];
        //echo "current semester: ".$semester;
    }
}

if($semester == "Winter") {
    $semester = "Spring";
} if($semester == "Spring") {
    $semester = "Summer";
} if($semester == "Summer") {
    $semester = "Fall";
} if($semester == "Fall") {
    $semester = "Winter";
    $year = $year + 1;
}

//echo "next semester: ".$semester;
//echo "next year: ".$year;

//make sure course is valid for next semester, if so get its information
$sql3 = "SELECT * FROM section AS s
        LEFT JOIN course AS c on s.CourseID = c.CourseID
        LEFT JOIN semesteryear AS sy ON s.SemesterYear = sy.SemesterYearID 
        LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
        LEFT JOIN day AS d ON d.day_id=s.Day
        WHERE sy.Year='".$year."' AND sy.Semester='".$semester."' AND s.CRN='".$crn."'";     

$result3 = $conn->query($sql3);  

if ($result3->num_rows > 0) {
    while($row = $result3->fetch_assoc()) {        
        $courseID = $row["CourseID"];
        $time = $row["TimeSlot"];
        $propStart = $row["Start"];
        $propEnd = $row["End"];
        $day = $row["Day"];
        $propFDay = $row["day_one"];
        $propLDay = $row["day_two"];
        $credits = $row["Credits"];
        $seatLim = $row["MaxSeats"];
        //echo "crn: ".$crn;
        //echo "time: ".$time;
        //echo "day: ".$day;
        //echo "credits: ".$credits;
        //echo "seat limit: ".$seatLim;
    }
} else {
    $error = 1;
    $msg .= "Not for an open semester ";
}

//get credits students currently enrolled in
if(isset($credits)) {
    $sql4 = "SELECT * FROM enrolled AS e
    LEFT JOIN section AS s ON s.CRN = e.CRN
    LEFT JOIN course AS c ON s.CourseID = c.CourseID
    LEFT JOIN semesteryear AS sy ON s.SemesterYear = sy.SemesterYearID
    WHERE e.UserEmail='".$user."' AND sy.Year='".$year."' AND sy.Semester='".$semester."'";

    $result4 = $conn->query($sql4);

    if ($result4->num_rows > 0) {
        while($row = $result4->fetch_assoc()) {
            $curCredits += $row["Credits"];
        }
    }

    //echo "current credits enrolled in: ".$curCredits;
    //echo "credits of class registering for: ".$credits;
    //echo "max credits allowed: ".$maxCredits;

    if (($curCredits + $credits) > $maxCredits) {
        $error = 1;
        $msg .= "over max credit limit"; 
    }    
}

//make sure student isn't enrolled in overlapping time slot
if(isset($day) && isset($time)) {
    $sql5 = "SELECT * FROM enrolled AS e
    LEFT JOIN section AS s ON e.CRN = s.CRN
    LEFT JOIN semesteryear AS sy ON s.SemesterYear = sy.SemesterYearID
    LEFT JOIN timeslot AS ts ON ts.TimeSlotID=s.TimeSlot
    LEFT JOIN day AS d ON d.day_id=s.Day
    WHERE e.UserEmail='".$user."' AND sy.Year='".$year."' AND sy.Semester='".$semester."' AND s.Day='".$day."'";

    $result5 = $conn->query($sql5);

    if ($result5->num_rows > 0) {
        while($row = $result5->fetch_assoc()) {
            $schedStart = $row["Start"];
            $schedEnd = $row["End"];
            $schedFDay = $row["day_one"];
            $schedLDay = $row["day_two"];

            if( (strtotime($propStart) <= strtotime($schedStart) && strtotime($schedStart) <= strtotime($propEnd)) || (strtotime($schedStart) <= strtotime($propEnd) && strtotime($propEnd) <= strtotime($schedEnd)) && $crn != $row["CRN"] ) {
                if( ($propFDay != $schedFDay) || ($propFDay != $schedLDay) || ($propLDay != $schedLDay) || ($propLDay != $schedFDay) ) {
                    $error = 1;
                    $msg .= "already scheduled during this time"; 
                } 
            }        
        }
    }
}

//get courses pre requisites
$sql6 = "SELECT * FROM prerequisite AS p
        LEFT JOIN section AS s ON p.CourseID = s.CourseID
        WHERE s.CRN='".$crn."'";

$result6 = $conn->query($sql6);

if ($result6->num_rows > 0) {
    while($row = $result6->fetch_assoc()) {
        $pre[] = $row["RequirementID"];
    }
}

/*for ($i = 0; $i < count($pre); $i++) {
    echo $pre[$i];
}*/

//make sure student has completed pre requisite or is enrolled currently
if(!empty($pre)) {
    for ($i = 0; $i < count($pre); $i++) {   
        $sql7 = "SELECT * FROM academicrecord AS a
                LEFT JOIN section AS s ON a.CourseID = s.CourseID
                WHERE a.UserEmail='".$user."' AND a.CourseID='".$pre[$i]."'";
    
        $result7 = $conn->query($sql7);
    
        if ($result7->num_rows > 0) {
            $check = 1;
        }

        if($check == 0) {
            $sql8 = "SELECT * FROM enrolled AS e
            LEFT JOIN section AS s ON s.CRN=e.CRN
            LEFT JOIN semesteryear AS sy on s.SemesterYear=sy.SemesterYearID
            WHERE sy.current=1 AND e.UserEmail='".$user."' AND s.CourseID='".$pre[$i]."'";
                    
            $result8 = $conn->query($sql8);
            
            if ($result8->num_rows == 0) {
                $error = 1;
                $msg .= "pre requisite not completed";
            }
        }
    }
}

//get amount of seats filled and check if class is full
if(isset($seatLim)) {
    $sql9 = "SELECT * FROM enrolled
            WHERE CRN='".$crn."'";

    $result9 = $conn->query($sql9);

    if ($result9->num_rows > 0) {
        while($row = $result9->fetch_assoc()) {
            $seatCount ++;
        }
    }

    //echo $seatCount;

    if ($seatCount >= $seatLim) {
        $error = 1;
        $msg .= "class is full";
    }
}

//make sure student isn't registered for different section of same course
if(isset($courseID)) {
    $sql10 = "SELECT * FROM enrolled AS e
    LEFT JOIN section AS s on e.CRN = s.CRN
    WHERE e.UserEmail='".$user."' AND ( s.CourseID='".$courseID."' OR s.CRN='".$crn."' ) ";

    $result10 = $conn->query($sql10);

    if ($result10->num_rows > 0) {
        while($row = $result10->fetch_assoc()) { 
            $error = 1;           
            $msg .= "Already registered for similar course ";
        }
    }
}

if($error == 0) {
    $stmt = $conn->prepare("INSERT INTO enrolled (UserEmail, CRN) VALUES (?, ?)");
    $stmt->bind_param("ss", $thisUser, $thisCrn);
    
    $thisUser = $user;    
    $thisCrn = $crn;
    
    $stmt->execute(); 
    $stmt->close();
}

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
<?php
if($error == 0) {
    echo "<h2>Registered for course</h2>";
} else {
    echo $msg;
}
?>
</div>    
</body>
</html>