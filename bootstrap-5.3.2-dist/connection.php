<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_mentoring_system";

$conn=mysqli_connect($servername, $username, $password, $database) or die("Connection error");

// Check if connection is successful
if ($conn) {
    // echo "Connected successfully";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>



