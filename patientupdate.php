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
    <?php
    $query ="SELECT * FROM user where username='$patient' and acc_type='2'";
    $data = mysqli_query($conn,$query);
    //$total=mysqli_num_rows($data);
    $result = mysqli_fetch_assoc($data);
    




    ?>
    <h1 style="text-align: center;"><?php echo "Welcome ".$fname; ?></h1>
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


            </style>
            <?php

            $query4 ="SELECT * FROM `treatment` JOIN user WHERE treatment.patient=user.username AND user.username='$patient'";
            $data4 = mysqli_query($conn,$query4);
            $total4=mysqli_num_rows($data4);
            $count=0;

            ?>
            <ul>

                <li><a href="patient.php">Prescription(<?php echo $total4; ?>)</a></li>
                <li><a href="patientupdate.php">Update Information</a></li>

            </ul>
        </div>
        <div class="div2">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Phone No.:<input type="text" name="phone_no" value="<?php echo $result['phone']; ?>"   /><br><br>

                Email:<input type="email" name="email" value="<?php echo $result['email']; ?>"  /><br><br>
                <button>Update</button>
            </form>

<?php
            if ($_POST) {
            $phone_no = $_POST['phone_no'];
            $email = $_POST['email'];
            $query2 = "UPDATE user SET phone='$phone_no', email='$email' WHERE username='$patient'";

            if (mysqli_query($conn,$query2)) {
            echo '<script>alert("Data updated successfully");</script>';
            }
            
            }
            ?>
        </div>
    </div>
</div>
<div class="footer">
<?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>