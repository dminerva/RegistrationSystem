<?php
if(!empty($_POST["major_id"])) {
?>
<?php
include 'connectDB.php';

$major = $_POST["major_id"];
$count = 0;
$total = 0;

$stu = [];

$sql = "SELECT * FROM academicrecord AS ar
        LEFT JOIN studentmajor AS sm ON sm.UserEmail=ar.UserEmail
        LEFT JOIN grade AS g ON ar.Grade=g.grade_letter
        LEFT JOIN major AS m ON sm.MajorID=m.MajorID
        LEFT JOIN department AS d on d.DeptID=m.DeptID
        WHERE sm.MajorID='".$major."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $count++;
        $total += $row["value"];
        $majorName = $row["major_name"];
        $deptName = $row["dept_name"];

        if(!in_array($row["UserEmail"], $stu)) {
            $stu[] = $row["UserEmail"];
        }
    }
}


if($count > 0) {
    $avg = (($total / $count) / 100) * 4; 
    
    echo "<p>department: </p><h2>".$deptName."</h2>";
    echo "<p>major: </p><h2>".$majorName."</h2>";
    echo "<p>students declared: </p><h2>".count($stu)."</h2>";
    echo "<p>average gpa: </p><h2>".$avg."</h2>";
} else {
    echo "<p>no studens enrolled in this major</p>";
}
?>
<?php
}
?>

