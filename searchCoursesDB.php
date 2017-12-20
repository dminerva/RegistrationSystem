<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Search Courses</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>

<div class="container">
<h2>Search Courses</h2>

<table class="table">
<thead>
    <tr>
        <th>Course Name</th><th>Course ID</th><th>Credits</th><th>Deptartment</th><th>Subject</th>
    </tr>
</thead>
<tbody>
<?php
include 'connectDB.php';

$count = 0;

$sql = "SELECT * FROM course AS c
        LEFT JOIN department AS d ON c.DeptID = d.DeptID
        LEFT JOIN subject AS s ON c.subject_id = s.subject_id";

if(isset($_POST['cname']) && $_POST['cname'] != "") {
	$count +=1;

	if ($count == 1) {
		$sql .= " WHERE c.CourseName='".$_POST['cname']."'";
	}
} if (isset($_POST['cid']) && $_POST['cid'] != "") {
	$count +=1;

	if ($count == 1) {
		$sql .= " WHERE c.CourseID='".$_POST['cid']."'";
	} elseif ($count > 1) {
		$sql .= " AND c.CourseID='".$_POST['cid']."'";
	}
} if (isset($_POST['dept']) && $_POST['dept'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE d.dept_name='".$_POST['dept']."'";
	} elseif ($count > 1) {
		$sql .= " AND d.dept_name='".$_POST['dept']."'";
	}
} if (isset($_POST['sub']) && $_POST['sub'] != "") {
	$count +=1;

	if ($count ==1) {
		$sql .= " WHERE s.subject_name ='".$_POST['sub']."'";
	} elseif ($count > 1) {
		$sql .= " AND s.subject_name ='".$_POST['sub']."'";
	}
}    

//echo $_POST['dept']." ".$_POST['sub'];

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