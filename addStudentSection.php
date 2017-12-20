<?php 
ob_start(); 
?>
<html>
<head>
<title>Register for Classes</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include "nav.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12"><img src="sunshinelogo.png" class="img-responsive center-block" alt="sunshinelogo"></div>
    </div>
    <form class="form-inline" action="" method="post">
        <h3 class="text-center">Add the CRN of the class you would like to register for</h3>
        <div class="row">
            <div class="col-sm-3">
                <input type="text" id="crn1" placeholder="Enter CRN" name="crn1">
            </div>  
            <div class="col-sm-3">
                <input type="text" id="crn2" placeholder="Enter CRN" name="crn2">
            </div>  
            <div class="col-sm-3">
                <input type="text" id="crn3" placeholder="Enter CRN" name="crn3">
            </div> 
            <div class="col-sm-3">
                <input type="text" id="crn4" placeholder="Enter CRN" name="crn4"> 
            </div>        
        </div>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-5">
                <button type="submit" class="btn btn-default">Submit</button> 
            </div>            
        </div>
    </form>
</div>
</body>
</html>