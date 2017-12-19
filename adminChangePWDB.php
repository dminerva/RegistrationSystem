<?php
include 'connectDB.php';

$error = 0;
$msg = "";

$user = $_POST["user"];
$pw1 = filter_var($_POST["pw1"], FILTER_SANITIZE_STRING);
$pw2 = filter_var($_POST["pw2"], FILTER_SANITIZE_STRING);

if($pw1 == $pw2) {
    $password = md5($pw1);

    $sql = "UPDATE user SET password='".$password."' WHERE UserEmail='".$user."'";
    $conn->query($sql);
} else {
    $error = 1;
    $msg = "passwords do not match";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Change password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
<?php
if($error == 0) {
    echo "<p>password changed</p>";
} else {
    echo "<p>".$msg."</p>";
}
?>
</div>  
</body>
</html>