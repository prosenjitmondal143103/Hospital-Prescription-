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
    if (isset($_SESSION['username'])) {
        $doctor=$_SESSION['username'];
    }else{
        header('location: login.php');
    }
    ?>
    <style>
        .patient_search{
            alignment: center;
        }

        .div0{
            display: flex;


        }


        .div1,.div2{
            width: 50%;
            height: auto
            margin-top: 0px;
            border: 2px solid black;
            margin: 10px;

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
</head>
<body>
<?php require 'inc/menu.php'; ?>
<div class="main-body" style="height: auto;">
    <div class="patient_search">
        <?php
        $query ="SELECT * FROM user where username='$doctor'";
        $data = mysqli_query($conn,$query);
        //$total=mysqli_num_rows($data);
        $result = mysqli_fetch_assoc($data);
        $fname=$result['name'];




        ?>
        <h1 style="text-align: center;"><?php echo "Welcome ".$fname; ?></h1>

        <form method="get" style="text-align: center"; action="doctor.php">
            Patient Id:<input type="text" name="patient"  >
            <button>Search</button>
        </form>


    </div>
    <div class="div0">
        <?php
        


        if(isset($_GET['patient'])){
            $patient=$_GET['patient'];
        if ($patient !=''){
        //$query1 ="SELECT * FROM user where username='$patient'";
        $query1 ="SELECT * FROM `patient` join `user` on `user`.`username` = `patient`.`name` WHERE `user`.`username` = '$patient'";
        $data1 = mysqli_query($conn,$query1);
        $total1=mysqli_num_rows($data1);
        $result1 = mysqli_fetch_assoc($data1);
        if ($total1 !=0){
        ?>
        <div class="div1">
            <style>
                table
                {
                    margin: 5%;
                    width: 90%;
                }
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                th, td {
                    padding: 5px;
                    text-align: left;
                }
            </style>

            <table >
                <tr>
                    <th colspan="2" style="text-align: center;background-color: #4CAF50;">Patient Info</th>
                </tr>

                <tr>
                    <th>Full Name: </th>
                    <td><?php echo "". $result1['name']."<br>"; ?> </td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><?php  echo $result1['gender']."<br>";  ?></td>
                </tr>
                <tr>
                    <th>Blood Group:</th>
                    <td><?php echo $result1['blood_group']."<br>";  ?></td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td><?php  echo $result1['age']."<br>"; ?></td>
                </tr>
                <tr>
                    <th>Phone No:</th>
                    <td><?php echo $result1['phone']."<br>"; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?php echo $result1['email']."<br>"; ?></td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td><?php  echo $result1['address']."<br>";  ?></td>
                </tr>
            </table>

            </div>
        <div class="div2">
            <h1>Prescription</h1>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?patient=<?php echo($patient); ?>">
                <fieldset >
                    <legend>Please Fill The Form</legend>

                    Disease:<input type="text" name="title" required /><br><br>
                    Prescribe:<textarea type="text" name="description" required></textarea><br><br>

                    <button>Submit</button>
                </fieldset>
            </form>
            <?php


                if ($_POST){
                    $date = date('Y-m-d');
                    $time=date('H:i:s');
                    $title=$_POST['title'];
                    $description=$_POST['description'];
                    
                    $query3 ="INSERT INTO treatment(id, doctor,patient,title,description,_date, _time) VALUES(null, '$doctor', '$patient','$title','$description', '$date', '$time')";
                    if (mysqli_query($conn, $query3)) {
                        echo '<script>alert("Prescription added");</script>';
                    }else{
                        echo '<script>alert("Prescription is not added");</script>';
                    }

            }




            ?>
        </div>
    </div>
    <div class="patient_treatment_history">
        <hr>
        <h2 style="text-align: center;color: white; border: 1px solid black;padding: 4px;background-color: #0c5460;"><?php echo $result1['first_name']." ".$result1['last_name'] ?> Treatment History</h2>
        <?php

        $query4 ="SELECT * FROM treatment where patient='$patient'";
        $data4 = mysqli_query($conn,$query4);
        $total4=mysqli_num_rows($data4);
        $count=0;
        ?>
        <table id="customers">
            <tr>
                <th>Serial No.</th>
                <th>Dates</th>
                <th>Times</th>
                <th>Doctor Names</th>
                <th>Diseases</th>
                <th>Prescriptions</th>
            </tr>

            <?php
            while ( $result4 = mysqli_fetch_assoc($data4)){
                $count++;
                ?>
                <tr>
                    <td><?php echo $count?></td>
                    <td><?php echo $result4['_date']?></td>
                    <td><?php echo $result4['_time']?></td>
                    <td><?php echo $doctor; ?></td>
                    <td><?php echo $result4['title']?></td>
                    <td><?php echo $result4['description']?></td>

                </tr>

                <?php
            }
            ?>
        </table>



                    <?php
                }
                else{
                    ?>
                    <script>alert('Patient Id Not Match');</script>

                <?php
                }
                }
                else{
                ?>
                    <script>alert('Enter Patient Id');</script>
                    <?php
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