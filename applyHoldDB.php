<?php
include 'connectDB.php'; 
$good = 0;
$email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
$holdtype = filter_var($_POST["hold"], FILTER_SANITIZE_STRING);
$sql = "SELECT UserEmail AND HoldType FROM holds WHERE UserEmail = '".$email."' AND HoldType = '".$holdtype."' "; 
$result = $conn->query($sql); 
if ($result->num_rows < 1) {
    $good = 1;
}
if ($good == 1) {
    $stmt = $conn->prepare("INSERT INTO holds (UserEmail, HoldType) VALUES (?, ?)");
    $stmt->bind_param("ss",$email, $holdtype);
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
    echo "<h2>Hold added</h2>";
} else {
    echo "<h2>Hold already exists</h2>";
}
?>
</div>    
</body>
</html>