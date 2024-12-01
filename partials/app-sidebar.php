<!-- kushan -------------------------------------------------------->
<link rel = "stylesheet" href= "css/sidebar.css">
<script src="js/scriptsideBar.js"></script>

<!-- kushan -------------------------------------------------------->
<div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">RGC</h3>
            <div class="dashboard_sidebar_user">
                <img src="images/whats22.png" alt="user image" id="userimage" />
                <span><?= $user['first_name'].''.$user['last_name'] ?></span>

            </div>
            
    <div class="dashboard_sidebar_menu">
            <ul class="dashboard_menu_lists">
                <!-- class="menuActive"-->
                <li>
                        <a href="./dashboard.php"><i class="bi bi-speedometer"></i><span class="menuText">  Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="#x"><i class="bi bi-person-add"></i> <span class="menuText"> Product Management</span></a>
                        <ul class = "subMenus">
                            <li>
                                <a class = "subMenuLink" href="./productView.php"><i class = "bi bi-person-add"></i><span class ="menuText">View Product</span></a>
                            </li>
                            <li>
                                <a class = "subMenuLink" href ="./productAdd.php"><i class = "bi bi-person-add"></i><span class ="menuText"> Add Product</span></a>
                            </li>
                        </ul>
                    </li>

                     <!-- kushan ------------------------------------------------------------------------------->
                    <li>
                        <a href="#"><i class="bi bi-bag-fill"></i> <span class="menuText"> Supplier Management</span><i class="bi bi-arrow-left-short up"></i></a>
                        <ul class = "subMenus">
                            <li>
                                <a class = "subMenuLink" href="./viewSupplier.php"><i class="bi bi-person-add"></i><span class="menuText"> View Supplier</span></a>
                            </li>
                            <li>
                                <a class = "subMenuLink" href="./addSupplier.php"> <i class = "bi bi-person-add"></i> <span class = "menuText"> Add Supplier</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href ="#"><i class = "bi bi-bag-fill"></i> <span class = "menuText">User Management</span><i class = "bi bi-arrow-left-short up"></i></a>
                        <ul class = "subMenus">
                            <li>
                                <a class = "subMenuLink" href="./viewUser.php"><i class = "bi bi-person-add"></i><span class = "menuText">View User</span></a>
                            </li>
                            <li>
                                <a class = "subMenuLink" href="./addUser.php"><i class = "bi bi-person-add"></i><span class = "menuText">Add User</span></a>
                            </li>
                        </ul>
                    </li>

                    <!-- kushan__ ---------------------------------------------------------------------------------->
            </ul>
    </div>
</div>