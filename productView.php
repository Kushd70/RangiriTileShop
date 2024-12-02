<?php
//start the session
session_start();
if(!isset($_SESSION['user'])) header('location: login.php');
$_SESSION['table'] = 'products';
$products = include('database/show.php');

?>


<!DOCTYPE html>
<html>
    <head>
        <title>View Products - Rangiri granite & Ceramic pvt(ltd)</title>
        <link rel="stylesheet" type="text/css" href="css/login.css?v=1.0">
        <link rel="stylesheet" type="text/css" href="css/login2.css?v=<?= time();?>">
        <link rel="stylesheet" type="text/css" href="css/usertable.css?v=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
    <div id="dashboardMainContainer"> 
        <?php include('partials/app-sidebar.php')?>

        <div class="dashboard_content_container" id="dashboard_content_container">

        <?php include('partials/app-topnav.php')?>

            
                    <div class="column column-7">
                    <h1 class="section_header"><i class="bi bi-list"></i>List of Products</h1>
                    <div class="section_content">
                        <div class="users">
                            
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                                                      
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($products as $index => $product){?>
                                     <tr>
                                        <td><?=$index + 1 ?></td>
                                        <td class="firstName">

                                            <!-- image huthoo hukanna--->
                                            <img class="productImages" src ="uploads/products/<?= $product['img'] ?>" alt="" />
                                        </td>
                                        <td class="lastName"><?=$product['product_name']?></td>
                                        <td class="email"><?=$product['description']?></td>

                                        <!---janith gahuve--->
                                    <td>
                                        <?php
                                            $pid = $product['created_by'];
                                            $stmt = $conn->prepare("SELECT * FROM users WHERE id=$pid ");
                                            $stmt->execute();
                                            $row    =$stmt->fetch(PDO::FETCH_ASSOC);
                                            $created_by_name = $row['first_name'] . ''. $row['last_name'];
                                            echo $created_by_name;
                                            
                                        ?>

                                    </td>

                                        <td><?= date('M d, Y @ h:i:s:A',strtotime($product['created_at']))?></td>
                                        <td><?= date('M d, Y @ h:i:s:A',strtotime($product['update_at']))?></td>
                                        <td>
                                            <!---janith ghuve---->
                                            <a href="" class="updateUser" data-pid="<?=$product['id'] ?>"><i class="bi bi-pencil"></i> Edit</a>
                                            <a href="" class="deleteUser" data-name="<?=$product['id'] ?>" ><i class="bi bi-trash3"></i> Delete</a>
                                        </td>
                                     </tr>
                                    <?php } ?>                                    
                                </tbody>
                            </table>
                            <p class="userCount"><?= count($products) ?> products</p>
                        </div>
                    
                    </div>

                    </div>
                </div>

            </div>
                
            </div>
        </div>
    </div>

        
        
    </body>
    <script src="js/script.js?v=<?= time();?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

   <!-- jQuery (required for BootstrapDialog) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap (required for BootstrapDialog) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- BootstrapDialog JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                        fullName = fname + ' ' + lname;
                         
                        if(window.confirm('Are you sure to delete '+ fname + '?')){
                            $.ajax({
                                method: 'POST',
                                data:{
                                    user_id: userId,
                                    f_name: fname,
                                    l_name: lname
                                },
                                url:'database/delete-user.php',
                                dataType:'Json',
                                success: function(data){
                                    if(data.success){
                                        if(window.confirm(data.message)){
                                            location.reload();
                                        }
                                    }else window.alert(data.message);
                                    
                                }
                            })
                        }
                        else{
                            console.log('will not delete');
                        }
                    

                    }
                    if(classList.contains('updateUser')){
                        e.preventDefault(); //prevent from loading....
                        
                        //get data
                        firstName=targetElement.closest('tr').querySelector('td.firstName').innerHTML;
                        lastName =targetElement.closest('tr').querySelector('td.lastName').innerHTML;
                        email    =targetElement.closest('tr').querySelector('td.email').innerHTML;
                        userId =targetElement.dataset.userid;

                       BootstrapDialog.confirm({
                        title: 'Update'+ firstName +'' + lastName,
                        message: '<form>\
                                <div class="form-group">\
                                   <label for="firstName"> First Name:</label>\
                                   <input type="text" class="form-control" id="firstName" value= "'+ firstName +'">\
                                </div>\
                                 <div class="form-group">\
                                   <label for="lastName"> Last Name:</label>\
                                   <input type="text" class="form-control" id="lastName" value= "'+ lastName +'">\
                                </div>\
                                 <div class="form-group">\
                                   <label for="email"> Email Address:</label>\
                                   <input type="email" class="form-control" id="emailUpdate" value= "'+ email +'">\
                                </div>\
                                  </form>',
                                  callback: function(isUpdate){

                                    if(isUpdate){
                                        $.ajax({
                                method: 'POST',
                                data:{
                                    userId:userId,
                                    f_name: document.getElementById('firstName').value,
                                    l_name: document.getElementById('lastName').value,
                                    email: document.getElementById('emailUpdate').value,
                                },
                                url:'database/update-user.php',
                                dataType:'Json',
                                success: function(data){
                                    if(data.success){
                                        if(window.confirm(data.message)){
                                            location.reload();
                                        }
                                    }else window.alert(data.message);
                                    
                                }
                            })
                                    }else{

                                    }
                                  }



                       });
                    }
                    

                });

            }


        }
        var script = new script;
        script.initialize();

    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>