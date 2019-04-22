<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Treatment Management</title>
    <link rel="stylesheet" href="style.css">
    <?php
    include("connection.php");
    error_reporting(0);
    session_start();
    $patient_id=$_SESSION['patient_id'];
    ?>
</head>
<body>


<div class="navbar">

    <a class="header"  href="index.php">Patient Treatment Management</a>
    <a class="menu" href="#home">Home</a>
    <a class="menu" href="#news">About Us</a>
    <a class="menu" href="#contact">Contact</a>
    <a class="menu1" href="index.php">Log Out</a>


</div>
<div class="main-body">
    <h1>Hi</h1>
    <?php

    //echo "p".$patient_id;
    $query1 ="SELECT * FROM patients where patient_id='$patient_id'";
    $data1 = mysqli_query($conn,$query1);
    //$total1=mysqli_num_rows($data1);
    $result1 = mysqli_fetch_assoc($data1);
    echo "Id: ". $result1['patient_id']."<br>";
    echo "First Name: ".$result1['first_name']."<br>";
    echo "Last Name: ".$result1['last_name']."<br>";
    echo "Gender: ".$result1['gender']."<br>";
    echo "Blood Group: ".$result1['blood_group']."<br>";
    echo "Age: ".$result1['age']."<br>";
    echo "Phone No: ".$result1['phone_no']."<br>";
    echo "Email: ".$result1['email']."<br>";
    echo "Address: ".$result1['address']."<br>";
    ?>
    <div>
        <div>
            <form>
                <input type="button" value="Add Prescription" onclick="window.location.href='prescription.php'" />
            </form>
        </div>
        <div>
            <form>
                <input type="button" value="Treatment History" onclick="window.location.href='patient_history.php'" />
            </form>
        </div>
    </div>
</div>
<div class="footer"><?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>