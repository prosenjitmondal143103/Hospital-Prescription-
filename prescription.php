<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Treatment Management</title>
    <link rel="stylesheet" href="style.css">
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
    <h1>Prescription</h1>
    <form method="post">
    <fieldset >
        <legend>Please Fill The Form</legend>

        Date:<input type="text" name="_date"   /><br><br>

        Title:<input type="text" name="title"   /><br><br>
        Description:<input type="text" name="description" /><br><br>

        <input type="submit" name="submit" VALUE="Submit" >
    </fieldset>
    </form>
    <?php
    include("connection.php");
    error_reporting(0);
    session_start();

    $patient_id=$_SESSION['patient_id'];
    $doctor_id=$_SESSION["doctor_id"];

    if ($_POST['submit']){

        $query1 ="INSERT INTO treatments (doctor_id,patient_id,_date,title,description) VALUES('$doctor_id', '$patient_id', '{$_POST['_date']}', '{$_POST['title']}','{$_POST['description']}' )";

        $data1 = mysqli_query($conn,$query1);
        if ($data1){
            echo "ADD successful";
        }
        else{
            echo "failed";
        }

    }

    ?>
</div>
<div class="footer"><?php require 'inc/footer-text.php'; ?>
</div>
</body>
</html>