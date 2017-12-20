<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>
<?php include 'connectDB.php';?>
<h2>Student Info Lookup</h2>
<div class="container">
  <form action="adminStuLookupDB.php" method="post">
    <div class="form-group">
            <label for="student">Student</label>
            <select class="form-control" name="email" id="email" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM student";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["UserEmail"]."'>".$row["UserEmail"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
    <div class="col-sm-10">
      <input type="submit" value="Submit" />
      <input type="reset" value="Clear" />
    </div>
  </form>


</div>
</body>
</html>
