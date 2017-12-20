<?php 
ob_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Lookup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php';?>
<div class="container">
<table class="table">
    <thead>
      <tr>
          <tr>
            <th>EMAIL</th><th>FNAME</th><th>LNAME</th><th>Type</th><th>ADVISOR</th>
          </tr>
        </tr>
    </thead>
    <tbody>
    <?php
    include 'connectDB.php';

    $student = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM student AS s
            LEFT JOIN user As u ON u.UserEmail = s.UserEmail
            LEFT JOIN advisor AS a ON s.UserEmail=a.StudentEmail";

    if(isset($_POST["email"]) && $_POST["email"] != "") {
      $sql = "SELECT * FROM user AS u
              LEFT JOIN advisor AS a ON u.UserEmail=a.StudentEmail
              WHERE u.UserEmail='".$student."'";
    }        

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["UserEmail"]."</td><td>".$row["FirstName"]."</td><td>".$row["LastName"]."</td><td>".
            $row["Type"]."</td><td>".$row["ProfessorEmail"]."</td></tr>";
      }
    }
    ?>
    </tbody>
    </table>
    
</div>
</body>
</html>
