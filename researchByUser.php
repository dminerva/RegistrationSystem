<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Research By User</title>
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
<h2>Choose a User Type</h2>
<form>
    <div class="form-group">
    <label for="user">User Type:</label>   
    <select class="form-control" name="user" id="user" onChange="getUserData(this.value);" required>
        <option value=""></option>
        <option value="student">Students</option>
        <option value="professor">Professors</option>
        <option value="research">Researchers</option>
        <option value="administrator">Administrator</option>
    </select> 
    </div>    
</form> 
<hr>
<div id="user_data"></div>  
</div>   
</body>
</html>