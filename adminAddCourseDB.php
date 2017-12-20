<?php
ob_start();
include 'connectDB.php';

$good = 0; 
$cName = filter_var($_POST["courseName"], FILTER_SANITIZE_STRING);

$sql = "SELECT CourseName FROM course
        WHERE CourseName='".$cName."'";

$result = $conn->query($sql);

if ($result->num_rows < 1) {
    $good = 1;
}

if ($good == 1) {
    $stmt = $conn->prepare("INSERT INTO course (CourseID, CourseName, Credits, DeptId, subject_id) VALUES (null, ?, ?, ?, ?)");
    $stmt->bind_param("siii", $course, $credits, $dept, $sub);

    $course = $cName;
    $credits = $_POST["creditAmt"];
    $dept = $_POST["dept"];
    $sub = $_POST["sub"];

    $stmt->execute();

    if(isset($_POST["pre"]) && $_POST["pre"] != "") {
        $sql = "SELECT CourseID FROM course WHERE CourseName='".$cName."'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $cID = $row["CourseID"];
            }
        }

        $stmt = $conn->prepare("INSERT INTO prerequisite (CourseID, RequirementID) VALUES (?, ?)");
        $stmt->bind_param("ss", $courseID, $req);

        $courseID = $cID;
        $req = $_POST["pre"];

        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Course</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
<?php
if($good == 1) {
    echo "<h2>Course added</h2>";
} else {
    echo "<h2>Course already exists</h2>";
}
?>
<a href="adminAddCourse.php">Back</a>
</div>    
</body>
</html>