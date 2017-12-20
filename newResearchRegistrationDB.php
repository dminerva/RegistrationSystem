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
    $pass = md5($_POST["pwd"]);
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $type = "research";
    
    

    
    $stmt = $conn->prepare("INSERT INTO research (UserEmail, Password, FirstName, LastName) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss",$uemail, $pass, $fname, $lname);
    $stmt->execute();
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
echo "<a href='newProfessorRegistration.php'>Back</a>";
?>
</div>    
</body>
</html>