<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Modify Section</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
<?php include 'nav.php' ?>
<div class="container">
    <h2>Modify Section</h2>
    <form action="adminModifySectionDB.php" method="post">
        <div class="form-group">
            <label for="course">CRN/Course</label>
            <select class="form-control" name="course" id="course" onChange="getProfFromCRN(this.value);" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM section AS s
                        LEFT JOIN course AS c on c.CourseID=s.CourseID
                        LEFT JOIN semesteryear AS sy on s.SemesterYear=sy.SemesterYearID
                        WHERE sy.current=2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["CRN"]."'>".$row["CRN"]." ".$row["CourseName"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="prof">Professor</label>
            <select class="form-control" name="prof" id="prof">
                <option value=""></option>
            </select>
        </div>
        <div class="form-group">
            <label for="day">Day</label>
            <select class="form-control" name="day" id="day">
                <option value=""></option>
                <?php
                $sql = "SELECT * FROM day";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["day_id"]."'>".$row["day_one"].", ".$row["day_two"]."</option>";
                    } 
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="">Time</label>
            <select class="form-control" name="time" id="time">
                <option value=""></option>
                <?php
                $sql = "SELECT * FROM timeslot";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["TimeSlotID"]."'>".$row["Start"]." - ".$row["End"]."</option>";
                    } 
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="room">Room/Building</label>
            <select class="form-control" name="room" id="room">
                <option value=""></option>
                <?php
                $sql = "SELECT * FROM room AS r
                        LEFT JOIN building AS b on r.BuildingID=b.BuildingID";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if($row["room_type"] != "office") {
                            echo "<option value=".$row["RoomID"]."|".$row["BuildingID"].">"."Room Type: ".$row["room_type"]." --- Room Number: ".$row["RoomID"]." --- Building: ".$row["build_name"]."</option>";
                        }                        
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="sy">Semester/Year</label>
            <select class="form-control" name="sy" id="sy">
                <option value=""></option>
                <?php
                $sql = "SELECT * FROM semesteryear WHERE current=2";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["SemesterYearID"]."'>".$row["Semester"]." ".$row["Year"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure you want to modify?');">Submit</button>
            <button type="reset" class="btn btn-default" onclick="return confirm('Are you sure you want to reset?');">Reset</button>
        </div>
    </form>
</div>
</body>
</html>