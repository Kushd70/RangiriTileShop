<?php
//start the session
session_start();
if(!isset($_SESSION['user'])) header('location: login.php');
$_SESSION['table'] = 'users';

$user=$_SESSION['user'];
$users = include('database/users-show.php');




?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Supplier - Rangiri granite & Ceramic pvt(ltd)</title>
        <link rel="stylesheet" type="text/css" href="css/login.css?v=1.0">
        <link rel="stylesheet" type="text/css" href="css/login2.css?v=<?= time();?>">
        <link rel="stylesheet" type="text/css" href="css/usertable.css?v=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    </head>
    <body>
    <div id="dashboardMainContainer">
        <?php include('partials/app-sidebar.php')?>

        <div class="dashboard_content_container" id="dashboard_content_container">

        <?php include('partials/app-topnav.php')?>

            <div class="dashboard_content">
                <div class="dashboard_content_main">
                <div class="row">
                    <div class="column column-5">
                        <h1 class="section_header"><i class="bi bi-plus-lg"></i>Create Supplier</h1>

                    <div id ="userAddFormContainer">

                    <form action="database/users-add.php" method ="POST" class="appForm">
                        <div class ="appFormInputContainer">
                            <label for="supplier_name">Supplier Name</label>
                            <input type="text"class="appFormInput" id="supplier_name" name="supplier_name"/>
                        </div>
                        <div class ="appFormInputContainer">
                            <label for="supplier_location">Location</label>
                            <input type="text" class="appFormInput" id="supplier_location" name="supplier_location"/>
                        </div>
                        <div class ="appFormInputContainer">
                            <label for="email">Email</label>
                            <input type="text" class="appFormInput" id="email" name="email"/>
                        </div>

                        <button type ="submit" class="appBtn"><i class="bi bi-plus-circle"></i>Add Supplier</button>
                        
                    </form>
                    <?php 
                    
                    if(isset($_SESSION['response']))  {
                        $response_message = $_SESSION['response']['message'];
                        $is_success  = $_SESSION['response']['success'];
                        
                        ?>
                    
                        <div class="responseMessage">
                            <p class ="responseMessage <?= $is_success ? 'responseMessage_success' : 'responseMessage_error'?>"> 
                            <?= $response_message ?>
                            </p>

                    </div>

                        <?php unset($_SESSION['response']);}   ?>

                    </div>

                    </div>
                    
                </div>

            </div>
                
            </div>
        </div>
    </div>

        
        
    </body>
    <script src="js/script.js"></script>
    <script>
         function script(){

            this.initialize = function(){
                this.registerEvents();
            },

            this.registerEvents = function(){
                document.addEventListener('click',function(e){
                    targetElement = e.target;
                    classList = e.target.classList;
                    

                    if(classList.contains('deleteUser') ){
                        e.preventDefault();
                        userId =targetElement.dataset.userid;
                        fname = targetElement.dataset.fname;
                        lname = targetElement.dataset.lname;
                         
                        if(window.confirm('Are you sure to delete?')){
                            console.log('will delete');
                        }
                        else{
                            console.log('will not delete');
                        }
                    

                    }
                    

                });

            }


        }
        var script = new script;
        script.initialize();

    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>