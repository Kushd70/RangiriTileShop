<?php
//start the session
session_start();
if(!isset($_SESSION['user'])) header('location: login.php');


$user=$_SESSION['user'];


?>

<!DOCTYPE html>
<html>
    <head>
        <title>DASHBOARD - Rangiri granite & Ceramic pvt(ltd)</title>
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    </head>
    <body>
    <div id="dashboardMainContainer">
         <?php include('partials/app-sidebar.php')?>

        <div class="dashboard_content_container" id="dashboard_content_container">
         <?php include('partials/app-topnav.php')?>

            <div class="dashboard_content">
                <div class="dashboard_content_main">

                </div>
            </div>
        </div>
    </div>

        
        
    </body>
    <script src="js/script.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>