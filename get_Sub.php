<?php
include 'connectDB.php';

if(!empty($_POST["dept_id"])) {
    $sql = "SELECT * FROM subject WHERE department_id='".$_POST["dept_id"]."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row["subject_id"]."'>".$row["subject_name"]."</option>";
        }
    }
}
?>