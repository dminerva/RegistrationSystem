<?php ob_start(); ?>
<html>
<head>
<title>view advisor</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>

<div class="container">
<table class="table">
<thead><tr><th>Student</th><th>Advisor</th><th>Building</th><th>Room</th><th>Office Hours</th><th></th></tr></thead>
<tbody>
<?php
include 'connectDB.php';

$user = $_SESSION["username"];
$f = $_SESSION["fName"];
$l = $_SESSION["lName"];
//echo $user." ".$f." ".$l;

$sql = "SELECT * FROM advisor AS a
        LEFT JOIN professor AS p ON a.ProfessorEmail = p.UserEmail
        LEFT JOIN building AS b ON p.building = b.BuildingID
        LEFT JOIN day AS d ON d.day_id = p.office_days
        LEFT JOIN timeslot AS t ON p.office_hours = t.TimeSlotID
        WHERE a.StudentEmail ='".$user."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$f." ".$l."</td><td>".$row["FirstName"]." ".$row["LastName"]."</td><td>".$row["build_name"]."</td><td>".$row["room"]."</td><td>".$row["day_one"].", ".$row["day_two"].
                " ".$row["Start"]." - ".$row["End"]."</td></tr>";
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