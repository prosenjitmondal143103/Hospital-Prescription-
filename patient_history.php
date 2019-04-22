<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Treatment Management</title>
    <link rel="stylesheet" href="style.css">

    <style>
        table,td,th,tr{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;

        }
        table{
            margin: 20px;

            width: 50%;


        }
        </style>
</head>
<body>


<div class="navbar">

    <a class="header"  href="index.php">Patient Treatment Management</a>
    <a class="menu" href="#home">Home</a>
    <a class="menu" href="#news">About Us</a>
    <a class="menu" href="#contact">Contact</a>
    <a class="menu1" href="login.php">Login</a>
    <a class="menu1" href="signup.php">SignUp</a>

</div>
<div class="main-body">
    <?php
    include("connection.php");
    error_reporting(0);
    session_start();
    $patient_id=$_SESSION['patient_id'];

    $query ="SELECT * FROM patients where patient_id='$patient_id'";
    $data = mysqli_query($conn,$query);
    //$total1=mysqli_num_rows($data1);
    $result = mysqli_fetch_assoc($data);
    //echo "First Name: ".$result['first_name']."<br>";
    //echo "Last Name: ".$result['last_name']."<br>";
    ?>
        <h2><?php echo $result['first_name']." ".$result['last_name'] ?> Treatment History</h2>
    <?php

    $query1 ="SELECT * FROM treatments where patient_id='$patient_id'";
    $data1 = mysqli_query($conn,$query1);
    $total1=mysqli_num_rows($data1);
    $count=0;
    ?>
    <table>
        <tr>
            <th>Serial No.</th>
            <th>Dates</th>
            <th>Doctor Names</th>
            <th>Diseases</th>
            <th>Prescriptions</th>
        </tr>

        <?php
    while ( $result1 = mysqli_fetch_assoc($data1)){
        $count++;
        ?>
        <tr>
            <td><?php echo $count?></td>
            <td><?php echo $result1['_date']?></td>
            <?php
            $doc_id=$result1['doctor_id'];
            $query2 ="SELECT * FROM doctors where doctor_id='$doc_id'";
            $data2 = mysqli_query($conn,$query2);
            $result2 = mysqli_fetch_assoc($data2);
            ?>
            <td><?php echo $result2['first_name']." ".$result2['last_name']?></td>
            <td><?php echo $result1['title']?></td>
            <td><?php echo $result1['description']?></td>

        </tr>

        <?php
    }
    ?>
    </table>
</div>
<div class="footer">
    <?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>