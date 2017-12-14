<?php
include 'connectDB.php';

$error = 0;

if(!empty($_POST["course_id"])) {
    $sql = "SELECT * FROM course WHERE CourseID='".$_POST["course_id"]."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {            
            $dept = $row["DeptID"];
            //echo "<option>".$dept."</option>";
        }
    } else {
        $error = 1;
    }

    if($error == 0) {
        $sql2 = "SELECT * FROM professor WHERE Department='".$dept."'";
        $result2 = $conn->query($sql2);

        //echo "<option>TEST</option>";
        //echo "<option>".$dept."</option>";

        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
                //echo $row["UserEmail"];
                //echo "<option>TEST</option>";
                echo "<option value='".$row["UserEmail"]."'>".$row["FirstName"]." ".$row["LastName"]."</option>";
            }
        }
    }
}
?>