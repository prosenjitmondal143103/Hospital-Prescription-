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
    if (isset($_SESSION["username"])) {
        $patient=$_SESSION["username"];
    }else{
        header('location: login.php');
    }
    $sql="SELECT * FROM patient WHERE name='$patient'";
    $result=mysqli_query($conn, $sql);
    $total=mysqli_num_rows($result);
    if ($total) {
        header('location: patient.php');
    }
    
    ?>
</head>
<body>
<?php require 'inc/menu.php'; ?>
<div class="main-body">
    <style>
        .div0{
            display: flex;
        }
        .div1{
            border: 2px solid black;
            width: 20%;
            height: 200px;
            margin: 5px;

        }
        .div2{
            border: 2px solid black;
            width: 75%;
            margin: 5px;
        }
    </style>
    <h1 style="text-align: center;"><?php echo "Welcome ".$patient; ?></h1>
    <div class="div0">
        <div class="div1">
            <style>
                ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    width: 100%;

                }

                li a {
                    display: block;
                    color: #000;
                    padding: 8px 16px;
                    text-decoration: none;
                    background-color: #f1f1f1;
                    margin:5px;
                }

                /* Change the link color on hover */
                li a:hover {
                    background-color: #555;
                    color: white;
                }

                #customers {
                //font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                    border-collapse: collapse;
                    width: 100%;
                    margin: 0px;
                    margin-bottom: 50px;
                }

                #customers td, #customers th {
                    border: 2px solid #ddd;
                    padding: 5px;
                    text-align: center;
                }

                #customers tr:nth-child(even){background-color: #f2f2f2;}

                #customers tr:hover {background-color: #ddd;}

                #customers th {
                    padding: 10px;
                    background-color: #4CAF50;
                    color: white;

                }
            </style>
            <?php

            $query ="SELECT * FROM `treatment` JOIN user WHERE treatment.patient=user.username AND user.username='$patient'";
            $data = mysqli_query($conn,$query);
            $total=mysqli_num_rows($data);
            $count=0;

            ?>
            <ul>

                <li><a href="patient.php">Prescription(<?php echo $total; ?>)</a></li>
                <li><a href="patientupdate.php">Update Information</a></li>

            </ul>
        </div>
        <div class="div2">
            <h2 style="text-align: center;color: white; border: 1px solid black;padding: 4px;background-color: #0c5460;">Add your info</h2>
            <form action="" method="POST">
                <div class="input-group">
                    <label for="blod">Blood group</label>
                    <select name="blood" id="blod" required>
                        <option value="">Select a group</option>
                        <option value="O+">O+</option>
                        <option value="A+">A+</option>
                        <option value="B+">B+</option>
                        <option value="AB+">AB+</option>
                        <option value="O-">O-</option>
                        <option value="A-">A-</option>
                        <option value="B-">B-</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" required>
                </div>
                <div class="input-group">
                    <label for="address">address</label>
                    <textarea name="address" required></textarea>
                </div>
                <button>Add info</button>
            </form>
            <?php
            if ($_POST) {
            $blood=$_POST['blood'];
            $age=$_POST['age'];
            $address=$_POST['address'];
            $sql="INSERT INTO patient(id, name, blood_group, age, address) VALUES(null,'$patient', '$blood', '$age', '$address')";
            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Information added");</script>';
            }else{
                echo '<script>alert("Information is not added");</script>';
            }
        }?>
        </div>
    </div>
</div>
<div class="footer">
    <?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>