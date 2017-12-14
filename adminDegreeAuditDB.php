<!DOCTYPE html>
<html lang="en">
<head>
<title>Degree Audit</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>

<div class="container">
<h2>Degree Audit</h2>
<?php
include 'connectDB.php';

$majorCount = 0;
$minorCount = 0;

$stu = filter_var($_POST["stu"], FILTER_VALIDATE_EMAIL);

$sql = "SELECT * FROM studentmajor AS sm
        LEFT JOIN major AS m ON m.MajorID = sm.MajorID
        WHERE sm.UserEmail='".$stu."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $majorCount += 1;
        if($majorCount == 1) {
            echo "Major: ".$row["major_name"];
        } if($majorCount > 1) {
            echo ", ".$row["major_name"];
        }
    }
}

$sql = "SELECT * FROM studentminor AS sm
LEFT JOIN minor AS m ON m.MinorID = sm.MinorID
WHERE sm.UserEmail='".$stu."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $majorCount += 1;
        if($majorCount == 1) {
            echo "Minor: ".$row["minor_name"];
        } if($majorCount > 1) {
            echo ", ".$row["minor_name"];
        }
    }
}
?>
<table class="table">
<h4>Courses still needed</h4>
<thead>    
    <tr>
        <th>Course</th><th>Course ID</th><th>Credits</th><th>Department</th><th>Subject</th>
    </tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM studentmajor AS sm
        LEFT JOIN major_req AS mr ON sm.MajorID = mr.major_id
        LEFT JOIN academicrecord AS ar ON ar.CourseID = mr.course_id
        LEFT JOIN course AS c ON c.CourseID = mr.course_id
        LEFT JOIN section AS s ON s.CourseID = c.CourseID
        LEFT JOIN department AS d ON c.DeptID = d.DeptID
        LEFT JOIN subject AS sub ON sub.subject_id = c.subject_id
        LEFT JOIN enrolled AS e ON s.CRN = e.CRN
        WHERE ar.CourseID IS NULL AND sm.UserEmail='".$stu."' AND e.CRN IS NULL";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["CourseName"]."</td><td>".$row["course_id"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"]."</td><td>".$row["subject_name"]."</td></tr>";
    }
}

$sql = "SELECT * FROM studentminor AS sm
LEFT JOIN minor_req AS mr ON sm.MinorID = mr.minor_id
LEFT JOIN academicrecord AS ar ON ar.CourseID = mr.course_id
LEFT JOIN course AS c ON c.CourseID = mr.course_id
LEFT JOIN section AS s ON s.CourseID = c.CourseID
LEFT JOIN department AS d ON c.DeptID = d.DeptID
LEFT JOIN subject AS sub ON sub.subject_id = c.subject_id
LEFT JOIN enrolled AS e ON s.CRN = e.CRN
WHERE ar.CourseID IS NULL AND sm.UserEmail='".$stu."' AND e.CRN IS NULL";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["CourseName"]."</td><td>".$row["course_id"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"]."</td><td>".$row["subject_name"]."</td></tr>";
    }
}
?>
</tbody>
</table>

<!--***loop through and show courses not completed for each of the users major/minors***-->

<table class="table">
<h4>Courses in progress</h4>
<thead>
    <tr>
        <th>Course</th><th>Course ID</th><th>Credits</th><th>Department</th><th>Subject</th>    
    </tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM enrolled AS e
        LEFT JOIN section AS s ON s.CRN = e.CRN
        LEFT JOIN course AS c ON s.CourseID = c.CourseID
        LEFT JOIN department AS d ON c.DeptID = d.DeptID
        LEFT JOIN subject AS sub ON sub.subject_id = c.subject_id
        LEFT JOIN semesteryear AS sy ON sy.SemesterYearID = s.SemesterYear
        WHERE e.UserEmail='".$stu."' AND sy.current='1'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["CourseName"]."</td><td>".$row["CourseID"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"]."</td><td>".$row["subject_name"]."</td></tr>";
    }
} else {
    echo "0 results";
}
?>
</tbody>
</table>
<table class="table">
<h4>Courses completed</h4>
<thead>
    <tr>
        <th>Course</th><th>Course ID</th><th>Credits</th><th>Department</th><th>Subject</th>
    </tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM academicrecord AS ar
        LEFT JOIN course AS c ON ar.CourseID = c.CourseID
        LEFT JOIN department AS d ON c.DeptID = d.DeptID
        LEFT JOIN subject AS s ON c.subject_id = s.subject_id
        WHERE ar.UserEmail='".$stu."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["CourseName"]."</td><td>".$row["CourseID"]."</td><td>".$row["Credits"]."</td><td>".$row["dept_name"]."</td><td>".$row["subject_name"]."</td></tr>";
    }
} else {
    echo "0 results";
}
?>
</tbody>
</table>
</div>
</body>
</html>