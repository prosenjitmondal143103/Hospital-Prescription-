<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="patient_treatment_management";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn) {
    //echo"ok";
} 
else{
	die("Connection failed because ".mysqli_connect_error());
}

?>