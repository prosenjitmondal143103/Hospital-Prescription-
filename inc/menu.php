<?php session_start(); ?>
<div class="navbar">
    <a class="header"  href="index.php">Hospital Prescription Management</a>
    <a class="menu" href="#home">Home</a>
    <a class="menu" href="#news">About Us</a>
    <a class="menu" href="#contact">Contact</a>
    <?php if (isset($_SESSION['username'])): ?>
        <?php if (isset($_SESSION['type'])): ?>
            <?php if ($_SESSION['type']=='2'): ?>
                <a class="menu1" href="patient.php">View prescription</a>
                <?php else: ?>
                    <a class="menu1" href="doctor.php">Prescribe</a>
            <?php endif ?>
        <?php endif ?>
        <a class="menu1" href="logout.php">Log out</a>
    <?php else: ?>
        <a class="menu1" href="login.php">Login</a>
        <a class="menu1" href="signup.php">SignUp</a>
    <?php endif ?>
</div>