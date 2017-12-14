<table class="table">
    <thead>
        <tr>
            <th>Course</th><th>Subject</th><th>Department</th><th>Semester</th><th>Year</th><th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'connectDB.php';

        $total = 0;
        $count = 0;

        if(!empty($_POST["course_id"])) {
            $sql = "SELECT * FROM academicrecord AS ar 
                    LEFT JOIN grade AS g ON g.grade_letter = ar.Grade
                    LEFT JOIN course AS c ON c.CourseID = ar.CourseID
                    LEFT JOIN semesteryear AS sy ON ar.SemesterYear = sy.SemesterYearID
                    LEFT JOIN department AS d ON c.DeptID = d.DeptID
                    LEFT JOIN subject AS s ON c.subject_id = s.subject_id
                    WHERE ar.CourseID='".$_POST["course_id"]."'";

            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["grade_letter"] != "I" || $row["grade_letter"] != "W") {
                        $count++;
                        $total += $row["value"];
                    }              

                    echo "<tr><td>".$row["CourseName"]."</td><td>".$row["subject_name"]."</td><td>".$row["dept_name"]."</td><td>".$row["Semester"]."</td><td>".$row["Year"]."</td><td>".$row["Grade"]."</td></tr>";
                }
            } else {
                echo "0 results";
            }
        }
        ?>					
    </tbody>
</table>

<?php
if($count > 0) {
    $avg = $total / $count;

    echo "<p>Average grade: ".$avg."</p>";
    echo "<p>Number of student who have taken the course: ".$count."</p>";
}
?>