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

?>	