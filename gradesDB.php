<?php include 'nav.php';?>
<?php
	include 'connectDB.php';
	$cid = $_POST["cid"];
	$sy = $_SESSION["SemesterYear"];
	$email = $_POST["users"];
	
	
	$grades = $_POST['Grade'];

	
		$grades = filter_var($grades, FILTER_SANITIZE_STRING);

		$stmt = $conn->prepare("INSERT INTO academicrecord (UserEmail,CourseID,Grade,SemesterYear) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("sisi",$email,$cid,$grades,$sy);
		//$stmt->execute();
 
         if($stmt->execute() === true) 
         {
 		echo "Grades successfully added ";
        // user exists
    } 
    else if($stmt !== true) {
    	echo mysqli_stmt_error($stmt);
        // user does not exist
    }







?>