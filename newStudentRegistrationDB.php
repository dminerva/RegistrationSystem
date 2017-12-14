<?php
include 'connectDB.php';

$good = 0; 
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);

$sql = "SELECT UserEmail FROM user
        WHERE UserEmail='".$email."'";

$result = $conn->query($sql);

if ($result->num_rows < 1) {
    $good = 1;
}

if ($good == 1) {
    $uemail = $email;
    $pass = $_POST["pwd"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $major = $_POST["major"]; 
    $minor = $_POST["minor"];
    $advisor = $_POST["advisor"];
    $status = $_POST["status"];
    $PtLim = 8; 
    $FtLim = 16;
    $advisor = $_POST["advisor"];

    $stmt = $conn->prepare("INSERT INTO student (UserEmail, Password, FirstName, LastName) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$uemail, $pass, $fname, $lname);
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO studentmajor (UserEmail, MajorID) VALUES (?, ?)");
    $stmt->bind_param("ss",$uemail, $major);
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO advisor (StudentEmail, ProfessorEmail) VALUES (?, ?)");
    $stmt->bind_param("ss", $uemail, $advisor);
    $stmt->execute();

    if (isset($_POST["minor"])) {
        $stmt = $conn->prepare("INSERT INTO studentminor (UserEmail, MinorID) VALUES (?, ?)");
        $stmt->bind_param("ss",$uemail, $minor);
        $stmt->execute();
    }
    if ($status == "parttime") {
        $type = "parttime";
        $stmt = $conn->prepare("INSERT INTO parttime (UserEmail, Password, FirstName, LastName, CreditLim) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi",$uemail, $pass, $fname, $lname, $PtLim);
        $stmt->execute();
        $stmt = $conn->prepare("INSERT INTO user (UserEmail, Password, FirstName, LastName, Type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$uemail, $pass, $fname, $lname, $type);
        $stmt->execute();
    }
    if ($status == "fulltime") {
        $type = "fulltime";
        $stmt = $conn->prepare("INSERT INTO fulltime (UserEmail, Password, FirstName, LastName, CreditLim) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi",$uemail, $pass, $fname, $lname, $FtLim);
        $stmt->execute();
        $stmt = $conn->prepare("INSERT INTO user (UserEmail, Password, FirstName, LastName, Type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$uemail, $pass, $fname, $lname, $type);
        $stmt->execute();
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Student</title>
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
    echo "<h2>Account added</h2>";
} else {
    echo "<h2>Student already exists</h2>";
}
?>
</div>    
</body>
</html>