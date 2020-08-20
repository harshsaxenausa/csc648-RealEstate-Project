<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <title> SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="/views/assets/style.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include_once(“googleanalytics.php”) ?>

<!-- navigation bar -->
<!-- <section id="nav-bar"> -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/views/index.php"><img src="/images/myLogo.png"></a>        
        <div class="d-flex">
            <h4 style="color: white;" align-content="justify-content-center">SFSU Software Engineering Project CSC 648-848, Summer 2020. For Demonstration Only!</h4></div>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" onclick="toggleMenu()">
        <span class="navbar-toggler-icon"></span>
        </button>

        <script>
        function toggleMenu() {
        var menu = document.getElementById("navbarNavAltMarkup");
        if (menu.style.display === "none") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
        }
        </script>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <?php
            session_start();
            include($_SERVER['DOCUMENT_ROOT'].'/controller/redirect.php');
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
<!-- </section> -->