<?php
include 'connectDB.php';

if(!empty($_POST["pre_id"])) {
    $sql = "SELECT * FROM course AS c
    LEFT JOIN prerequisite AS p ON p.RequirementID=c.CourseID
    WHERE p.CourseID='".$_POST["pre_id"]."'";
    $result = $conn->query($sql);
        
    echo "<option></option>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row["CourseID"]."'>".$row["CourseName"]."</option>";
        }
    }
}
?>