<?php 

$email = $_POST["users"];

$CrnNumber = $_POST["crnNumber"];
echo $CrnNumber;
?>
<?php
include 'connectDB.php';
include 'nav.php';
$currentDay = 0; 
$Date = $_POST["myDate"];
$newDate = date($Date);

$crnNumber = $_SESSION["CRN"];
//$CrnNumber = $_POST["crnNumber"];
$CrnNumber = mysqli_real_escape_string($conn,$CrnNumber);
$email = $_POST["users"];
$Present = $_POST["radio"];

if($Present  == "True"){
	$currentDay = "1" ;
}
else if($Present  == "False"){
	$currentDay = "0";
}
	$sql = "INSERT INTO attendance (CRN,userEmail,days,present) VALUES ('$crnNumber','$email','$Date','$currentDay')";
	$result = $conn->query($sql);

	if ($result === TRUE) 
	{
    echo "attendance taken successfully";
	} 
	else
	{
    echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();

?>