<?php
include 'connectDB.php';

$good = 0; 
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);

$sql = "SELECT UserEmail FROM professor
        WHERE UserEmail='".$email."'";

$result = $conn->query($sql);

if ($result->num_rows < 1) {
    $good = 1;
}

if ($good == 1) {
    $stmt = $conn->prepare("INSERT INTO professor (UserEmail, Password, FirstName, LastName, Department, room, building, office_hours, office_days) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssis",$uemail, $pass, $fname, $lname, $dept, $room, $bldg, $office_hours, $office_days);
    $uemail = $email;
    $type = "professor";
    $pass = $_POST["pwd"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dept = $_POST["dept"];
    $room = $_POST["room"];
    $bldg = $_POST["bldg"];
    $office_hours = $_POST["office_hours"];
    $office_days = $_POST["office_days"];
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO user (UserEmail, Password, FirstName, LastName, Type) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$uemail, $pass, $fname, $lname, $type);
    $stmt->execute();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Professor</title>
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
    echo "<h2>Professor added</h2>";
} else {
    echo "<h2>Professor already exists</h2>";
}
?>
</div>    
</body>
</html>