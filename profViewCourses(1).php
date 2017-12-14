<?php
session_start();
$DBservername = "localhost";
$DBusername = "root";
$DBpassword = "";
$DBname = "registrationsystem";

// Create connection
$conn = new mysqli($DBservername, $DBusername, $DBpassword, $DBname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Form Handling set Post variable to retrieve in php function

// HTML File inside a UL or a table 
//Output
//Use session variable

$user = $_SESSION["username"];
echo $user; 

/*
$sql = "SELECT * FROM section as sec 
LEFT JOIN course as c ON sec.CourseID = c.CourseID 
WHERE sec.prof_email = '" . $user . "'";
/*"SELECT section.Professor,section.CRN,section.Day,section.BuildingID,
section.SemesterYear, course.CourseName as Course
FROM section 
LEFT JOIN course ON course.CourseID = section.CourseID WHERE Professor = '$ProfessorName";
*/


// Append the time to the JOIN NOW 

//$sql = "SELECT * FROM section WHERE prof_email ='".$user."'";
$sql = "SELECT * FROM section as sec 
LEFT JOIN course as c ON sec.CourseID = c.CourseID 
WHERE sec.prof_email = '" . $user . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        echo $row['Day'].$row['CourseName'].$row['CRN'].$row['prof_email'];

    } 

} else {
    echo "0 results";
}
/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_object()) {
        echo "{$row-> Professor} ({$row->Course}) ($row->CRN) ($row->Day)($row->BuildingID)
        ($row->SemesterYear) <br>";
    }
} else {
    echo "NO results";


}
*/


$conn->close();













/*
$result = $conn->query("SELECT * FROM section");
if($result ->num_rows){
	if($count = $result ->num_rows){
		
		echo '<p>',$count,'</p>';
	}
	 while($row = $result->fetch_assoc()) {

	 	echo $row['CRN'],' ', $row['CourseID'],' ',$row['Credits'], ' ', $row['Professor'],

	 	' ', $row['Day'], ' ', $row['TimeSlot'], ' ', $row['RoomID'], ' ', $row['BuildingID'], ' ', $row['SemesterYear'], ' ',
	 	$row['MaxSeats'], '<br>' ;

	 }
	 
}

*/

?>