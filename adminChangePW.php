<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Change Password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
    <h4>Select a user whos password you wish to change</h4>
    <form action="adminChangePWDB.php" method="post">
        <div class="form-group">
            <label for="user">User</label>
            <select class="form-control" name="user" id="user" required>
                <option value=""></option>
                <?php
                include 'connectDB.php';

                $sql = "SELECT * FROM user";

                $result = $conn->query($sql);
                    
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["UserEmail"]."'>".$row["FirstName"]." ".$row["LastName"]."</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pw1">New password</label>
            <input class="form-control" type="password" name="pw1" id="pw1" placeholder="Enter new password" required>
        </div>
        <div class="form-group">
            <label for="pw1">Confirm new password</label>
            <input class="form-control" type="password" name="pw2" id="pw2" placeholder="Confirm new password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default" onclick="return confirm('Are you sure you want to modify?');">Submit</button>
        </div>
    </form>
</div>  
</body>
</html>