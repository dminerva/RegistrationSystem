<!DOCTYPE html>
<html lang="en">
<head>
<title>Create Timeslot</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <h2>Create a timeslot</h2>
    <form action="adminCreateTimeSlotDB.php" method="post">
        <div class="row">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="startH">Start hour:</label>
                    <select class="form-control" name="startH" id="startH" required>
                        <?php
                        for($i = 1; $i < 25; $i++) {
                            echo "<option value='".$i."'>".$row["Semester"]." ".$i."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="startM">Start minute:</label>
                    <select class="form-control" name="startM" id="startM" required>
                        <?php
                        for($i = 0; $i < 60; $i++) {
                            echo "<option value='".$i."'>".$row["Semester"]." ".$i."</option>";
                        }
                        ?>                    
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="endH">End hour:</label>
                    <select class="form-control" name="endH" id="endH" required>
                        <?php
                        for($i = 1; $i < 25; $i++) {
                            echo "<option value='".$i."'>".$row["Semester"]." ".$i."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="endM">End minute:</label>
                    <select class="form-control" name="endM" id="endM" required>
                        <?php
                        for($i = 0; $i < 60; $i++) {
                            echo "<option value='".$i."'>".$row["Semester"]." ".$i."</option>";
                        }
                        ?>                    
                    </select>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <h2>Create a day combination</h2>
    <form action="adminCreateDayDB.php" method="post">
        <div class="row">
            <div class="form-group">
                <div class="col-sm-4">
                    <label for="fDay">First Day:</label>
                    <select class="form-control" name="fDay" id="fDay" required>
                        <option value=""></option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="lDay">Second Day:</label>
                    <select class="form-control" name="lDay" id="lDay" required>
                        <option value=""></option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>    
                    </select>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>