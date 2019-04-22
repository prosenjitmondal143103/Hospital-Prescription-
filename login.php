<?php session_start(); ?>
<?php if (isset($_SESSION['username'])):
    header('location: index.php');
endif ?>
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
            height: 600px;
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
<div class="main-body" style="height:650px;">
    <div class="div0">
        <div class="div1">
            <h3 class="div1_title">Doctor Login</h3>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <fieldset class="div1_form">
                    <legend>Please Fill The Form</legend>

                    Username:<input type="text" name="username"/><br><br>
                    Password:<input type="password" name="password"/><br><br>

                    <button>Login</button>
                </fieldset>
            </form>

        </div>
        <?php
        include("connection.php");
        error_reporting(0);
        
        if ($_POST) {
            $username=$_POST['username'];
            $password=md5($_POST['password']);
            $sql="SELECT * FROM user WHERE username='$username' AND password='$password'";
            $result=mysqli_query($conn, $sql);
            if ($result->num_rows) {
                while ($row=mysqli_fetch_assoc($result)) {
                    $_SESSION['username']=$row['username'];
                    $_SESSION['type']=$row['acc_type'];
                    if ($_SESSION['type']=='2') {
                       header('location: patient.php'); 
                    }else{
                        header('location: doctor.php');
                    }
                    
                }
            }else{
                echo '<script>alert("Username or password error")</script>';
            }

        }

        ?>

        
    </div>

</div>
<div class="footer">
    <?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>