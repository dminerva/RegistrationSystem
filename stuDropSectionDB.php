<?php
session_start();
include 'connectDB.php';

//SANITIZE INPUT
$crn1 = filter_var($_POST["crn1"], FILTER_VALIDATE_INT);
$crn2 = filter_var($_POST["crn2"], FILTER_VALIDATE_INT);
$crn3 = filter_var($_POST["crn3"], FILTER_VALIDATE_INT);
$crn4 = filter_var($_POST["crn4"], FILTER_VALIDATE_INT);

if(isset($crn1) && $crn1 != "") {
    //echo "crn1 set";
    $sql1 = "DELETE FROM enrolled WHERE UserEmail='".$_SESSION["username"]."' AND CRN='".$crn1."'";

    $conn->query($sql1);
} if(isset($crn2) && $crn2 != "") {
    //echo "crn2 set";
    $sql2 = "DELETE FROM enrolled WHERE UserEmail='".$_SESSION["username"]."' AND CRN='".$crn2."'";
    
    $conn->query($sql2);
} if(isset($crn3) && $crn3 != "") {
    //echo "crn3 set";
    $sql3 = "DELETE FROM enrolled WHERE UserEmail='".$_SESSION["username"]."' AND CRN='".$crn3."'";
    
    $conn->query($sql3);
} if(isset($crn4) && $crn4 != "") {
    //echo "crn4 set";
    $sql4 = "DELETE FROM enrolled WHERE UserEmail='".$_SESSION["username"]."' AND CRN='".$crn4."'";
    
    $conn->query($sql4);
}

session_write_close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Section</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
<h2>Record deleted sucessfuly</h2>
</div>    
</body>
</html>