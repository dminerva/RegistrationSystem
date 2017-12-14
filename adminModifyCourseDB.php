<?php
include 'connectDB.php';

$count = 0;
$count2 = 0;
$msg = "";
$courseID = $_POST["courseID"];

if(isset($_POST["creditAmt"]) && $_POST["creditAmt"] != "") {
    $count++;
    //echo "count credit";
    $credits = $_POST["creditAmt"];
}

if(isset($_POST["dept"]) && $_POST["dept"] != "") {
    $count++;
    //echo "count dept";
    $department = $_POST["dept"];
}

if(isset($_POST["sub"]) && $_POST["sub"] != "") {
    $count++;
    //echo "count sub";
    $subject = $_POST["sub"];
}

if(isset($_POST["pre"]) && $_POST["pre"] != "") {
    $count++;
    $req = $_POST["pre"];
}

if($count > 0) {
    $sql = "UPDATE course SET ";

    if($count > 0 && isset($credits)) {
        $sql .= "Credits='".$credits."'";
    }

    if($count == 1 && isset($department)) {
        $sql .= "DeptID='".$department."'";
    } elseif ($count > 1  && isset($department)) {
        $sql .= ", DeptID='".$department."'";
    }

    if($count == 1 && isset($subject)) {
        $sql .= "subject_id='".$subject."'";
    } elseif ($count > 1 && isset($subject)) {
        $sql .= ", subject_id='".$subject."'";
    }

    $sql .= " WHERE CourseID='".$courseID."'";

    $conn->query($sql);
}

if(isset($_POST["pre"]) && $_POST["pre"] != "") {
    $req = $_POST["pre"];

    //check if pre req dosnt already exist
    $sql2 = "SELECT * FROM prerequisite WHERE CourseID='".$courseID."' AND RequirementID='".$req."'";
    $result2 = $conn->query($sql2);
    
    if ($result2->num_rows == 0) {
        //check if course is a pre req of the pre req
        $sql3 = "SELECT * FROM prerequisite WHERE CourseID='".$req."' AND RequirementID='".$courseID."'";
        $result3 = $conn->query($sql3);
        
        if ($result3->num_rows == 0) {
            $count2++;

            $stmt = $conn->prepare("INSERT INTO prerequisite (CourseID, RequirementID) VALUES (?, ?)");
            $stmt->bind_param("ss", $c, $r);

            $c = $courseID;
            $r = $req;

            $stmt->execute();
        } else {
            $msg .= "can not add pre requisite";
        }
    } else {
        $msg .= "can not add pre requisite";
    }
}

if(isset($_POST["delPre"]) && $_POST["delPre"] != "") {
    $delReq = $_POST["delPre"];

    $sql4 = "SELECT * FROM prerequisite WHERE CourseID='".$courseID."' AND RequirementID='".$delReq."'";
    $result4 = $conn->query($sql4);

    if ($result4->num_rows > 0) {
        $count2++;

        $sql5 = "DELETE FROM prerequisite WHERE CourseID='".$courseID."' AND RequirementID='".$delReq."'";
        $conn->query($sql5);
    } else {
        $msg .= "can not delete pre requisite";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Modify Course</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
<?php
if($count == 0 && $count2 == 0) {
    echo "<h2>No course modified</h2>";
    //echo $count;
} elseif ($count > 0 || $count2 > 0) {
    echo "<h2>Course modified</h2>";
    //echo $count;
}

if($msg != "") {
    echo "<p>".$msg."</p>";
}
?>
</div> 
</body>
</html>