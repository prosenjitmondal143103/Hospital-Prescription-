<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Treatment Management</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .div0{
            display: flex;
            margin: 10px;
            padding:20px;
            height: auto;
            border: 2px solid black;
            margin-top: 20px;
            background-color: #b9bbbe;

        }
        .div1 a {
            background-color: #f44336;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            margin: 10px;

        }
        .div1,.div2{
            width: 50%;
            height: auto;
            margin: 0px auto;
        }

        .div1_title,.div2_title{
            border: 1px solid white;
            text-align: center;
            background-color: #103572;
            padding: 5px;
            color: white;
        }
        .div1_form,.div2_form{
            margin-top: -10px;
        }
        .div2{
            width: 50%;
        }
        .div2 a {
            background-color: #4CAF50;;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            margin: 10px;

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
<div class="main-body" style="height:auto;">
    <div class="div0">
        <div class="div1">
            <h3 class="div1_title">Doctor Registration Form</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset class="div1_form">
                    <legend>Please Fill The Form</legend>
                    Full Name:<input type="text" name="name"  required /><br><br>
                    Username:<input type="text" name="username" required /><br><br>

                    Phone No.:<input type="text" name="phone_no"  required/><br><br>

                    Email:<input type="email" name="email"   required/><br><br>
                    Password:<input type="password" name="password"  required /><br><br>
                    <button>Sign Up</button>
                </fieldset>
            </form>

        </div>
        <?php
        include("connection.php");
        if ($_POST) {
            $name=$_POST['name'];
            $username=$_POST['username'];
            $phone_no=$_POST['phone_no'];
            $email=$_POST['email'];
            $password=md5($_POST['password']);
            $sql="INSERT INTO user(id, name, username, email, password, phone, acc_type) VALUES(null, '$name', '$username', '$email', '$password','$phone_no', '2')";
            if (mysqli_query($conn, $sql)) {
                echo '<script> alert("Signup completed. you can login now");</script>';
            }else{
                echo '<script> alert("Something went wrong");</script>';
            }
        }
        ?>

</div>
<div class="footer">
    <?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>