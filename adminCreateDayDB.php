<?php
ob_start();
include 'connectDB.php';

$error = 0;
$msg = "";
$fDay = $_POST["fDay"];
$lDay = $_POST["lDay"];

//days can not be the same
if( ($fDay != $lDay) ) {
    $sql1 = "SELECT * FROM day";

    $result1 = $conn->query($sql1);
    
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            $fExist = $row["day_one"];
            $lExist = $row["day_two"];

            //check if combination exists
            if( $fDay == $fExist && $lDay == $lExist ) {
                $error = 1;
                $msg .= "combination already exists";
            }
        }
    }
} else {
    $error = 1;
    $msg .= "days can not be the same";
}

if($error == 0) {
    $stmt = $conn->prepare("INSERT INTO day (day_id, day_one, day_two) VALUES (null, ?, ?)");
    $stmt->bind_param("ss", $thisOne, $thisTwo);

    $thisOne = $fDay;
    $thisTwo = $lDay;

    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Create day combination</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
<?php
if($error == 1) {
    echo "<p>".$msg."</p>";
} else {
    echo "<h2>Day combination added</h2>";
}
?>
</div>
</body>
</html>