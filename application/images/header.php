<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<!-- navigation bar -->
<section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/views/index.php"><img src="/images/myLogo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <h6 class="text-center">SFSU Software Engineering Project CSC648-848, Summer 2020. For Demonstration Only.</h6>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <?php
            session_start();
            include($_SERVER['DOCUMENT_ROOT'].'/models/GatorHub.php');
            //if (session_status() == PHP_SESSION_ACTIVE) {
            if (isset($_SESSION['sys_id']) && $_SESSION['sys_id'] != '') {
                include 'header_registered.php';

            } else {
                include 'header_guest.php';
            }
            ?>


        </div>
    </nav>
</section>