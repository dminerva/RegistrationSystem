<?php include 'nav.php';?>
<?php
	include 'connectDB.php';
	$user = $_SESSION["username"];
	$CRN = $_SESSION["CRN"];
	$cid = $_SESSION["CourseID"];
	$sy = $_SESSION["SemesterYear"];
	$email = $_SESSION["UserEmail"];
	
	$users = $_POST['users'];
	$grades = $_POST['Grade'];

	
		$grades = filter_var($grades, FILTER_SANITIZE_STRING);

		$stmt = $conn->prepare("INSERT INTO academicrecord (UserEmail,CourseID,Grade,SemesterYear) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("sisi",$email,$cid,$grades,$sy);
		$stmt->execute();
 
 	if($stmt) 
 	{
 		echo "grades added ";
        // user exists
    } 
    else {
    	echo "grades dont exist";
        // user does not exist
    }
	




?>