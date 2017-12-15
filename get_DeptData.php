<?php
if(!empty($_POST["dept_id"])) {
    include 'connectDB.php'; 

    $deptID = $_POST["dept_id"];
    $majorList = [];
    $subjectList = [];
    $professorList = [];
    $profCount = 0;
    $subjectMsg = "";
    $majorMsg = "";

    $sql = "SELECT * FROM department AS d
            LEFT JOIN subject AS s ON s.department_id=d.DeptID
            LEFT JOIN professor AS p ON p.Department=d.DeptID
            LEFT JOIN major AS m on m.DeptID=d.DeptID            
            WHERE d.DeptID='".$deptID."'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $deptName = $row["dept_name"];

            if(!in_array($row["major_name"], $majorList)) {
                $majorList[] = $row["major_name"];
            }

            if(!in_array($row["subject_name"], $subjectList)){
                $subjectList[] = $row["subject_name"];
            }    
            
            if(!in_array($row["UserEmail"], $professorList)){
                $professorList[] = $row["UserEmail"];
                $profCount++;
            } 
        }
    }

    //echo count($majorList);
    //echo count($subjectList);
    echo "<p>department:</p><h2>".$deptName."</h2>";
    
    echo "<p>subjects:</p>";
    for($i = 0; $i < count($subjectList); $i++) {
        echo "<h2>".$subjectList[$i]."</h2>";
    }

    echo "<p>majors:</p>";
    for($i = 0; $i < count($majorList); $i++) {
        echo "<h2>".$majorList[$i]."</h2>";
    }

    echo "<p>professors in department:</p><h2>".$profCount."</h2>";

}
?>
