<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php include 'nav.php';?>
    <div class="container">
    <table class="table">
    <thead>
        <tr> 
            <th>CRN</th><th>Course Name</th><th> Building</th><th> Room</th><th> Start</th><th> End</th>
        </tr>
  </thead> 
   <tbody>
    <?php
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
     
    $user = $_SESSION["username"];

    //Put into table AND Style 
    $sql = "SELECT * FROM section as sec 
    LEFT JOIN course as c ON sec.CourseID = c.CourseID 
    LEFT JOIN building as b ON sec.BuildingID = b.BuildingID
    LEFT JOIN timeSlot as t ON sec.TimeSlot = t.TimeSlotID
    LEFT JOIN semesterYear as sy ON sec.semesterYear = sy.semesterYearID
    WHERE sy.semesterYearID = '".$_POST["sy"]."'AND sec.prof_email = '" . $user . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>".$row['CRN']."</td><td>".$row['CourseName']."</td><td>".$row['build_name']."</td><td>".$row['CRN']."</td><td>".$row['Start']."</td><td>".$row['End']."</td></tr>";
        } 

    }

    $conn->close();
    ?>


   </tbody>
</table>
</div>
</body>
</html>