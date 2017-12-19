<?php
session_start();
include 'connectDB.php';

$email = $_POST["email"];
$password = $_POST["password"];
$password = md5($password);

$email = filter_var($email, FILTER_SANITIZE_STRING);
$password = filter_var($password, FILTER_SANITIZE_STRING);



$sql = "SELECT * FROM user WHERE UserEmail = '$email' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		$type = $row["Type"];
		$user = $row["UserEmail"];
		$fN = $row["FirstName"];
		$lN = $row["LastName"];
		$_SESSION["loggedin"] = $type;
		$_SESSION["username"] = $user;
		$_SESSION["fName"] = $fN;
		$_SESSION["lName"] = $lN;

		//echo "$type login sucessful";
		if ($type == "fulltime") {
			header("Location: studentHome.php");
		}
		if ($type == "parttime") {
			header("Location: studentHome.php");
		}
		if ($type == "professor") {
			header("Location: professorHome.php");
		}
		if ($type == "research") {
			header("Location: researchHome.php");
		}
		if ($type == "admin") {
			header("Location: adminHome.php");
		}
	}
	
} else {
	echo "please enter a valid email and password";
}

$conn->close();
?>



