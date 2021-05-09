<!DOCTYPE html>
<html lang="en">
<head>
    <?php   
    session_start();
    ?>
    <title>Online Grocery | Cloud</title>

    <!-- Meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloud Online Grocery Website">
    <meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
    <meta name="Keywords" content="Cloud, Online Grocery">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/P1.css">
    <link rel="stylesheet" href="../css/P3-Frozen.css">
    <!-- <link rel="stylesheet" href="../css/test.css"> -->

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/5995e1d6ee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <!-- HEADER -->
    <header id="header">
        <a href="P1.php" class="display-4"> <span id="title">CLOUD</span> ONLINE GROCERY </a>
    </header>

    <!-- MENU -->
    <div id="menu">
        <div id="box">
            <a href="P1.php"> <img src="../images/cloud.jpg" alt="grocery store logo" id="logo" class="center"> </a>

            <form action="" class="search-box" class="center">
                <input type="text" name="search" placeholder="Search Products">
                <button type="submit"> <i class="fa fa-search"></i> </button>
            </form>
            
            <form action="" class="icons" class="center">
            <?php if($_SESSION['loggedIn'] == true){
                    echo"<a href='../php/P5.php' name='log-out'><i class='fas fa-sign-in-alt'></i>Log out</a>";
                }
                else{
                    echo"<a href='../php/P5.php' name='sign-in'><i class='fas fa-sign-in-alt'></i> Sign in</a>";
                    echo"<a href=''../php/P6.php' name='my-list'><i class='fas fa-user-plus'></i> Sign up</a>";
                }
                ?>
                <a href="../php/P4.php" id="shopping-cart"> <i class="fa fa-shopping-cart"></i>Cart</a>
            </form>
        </div>
    </div>

    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-light">
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-5 dropdown" ><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">AISLES <span class="caret"></span></a>
                    <ul class="dropdown-menu bg-gray">
                        <li><a href="../html/P2-1.html">Fruits & Vegetables</a></li>
                        <li><a href="../html/P2-2.html">Dairy & Eggs</a></li>
                        <li><a href="../html/P2-3.html">Beverages</a></li>
                        <li><a href="../html/P2-4.html">Meat & Poultry</a></li>
                        <li><a href="../html/P2-5.html">Frozen</a></li>
                        <li><a href="../html/P2-6.html">Snacks</a></li>
    
                    </ul>
                </li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">FLYER</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">RECIPES</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">NEW PRODUCTS</a></li>
            </ul>
        </div>
    </nav>

    <!-- MAIN SECTION - PRODUCTS -->
    <div class="container">
        <div class="image">
            <img src="../images/fries.jpg" alt="404" class="img-responsive  productImage">
        </div>
        
        <div class="">

            <!-- PRODUCT NAME -->
            <div class="heading">
                <h1>Frozen Fries</h1>
                <hr/>
            </div>

            <!-- PRODUCT PRICE -->
            <div>
                <!-- Display unit price -->
                <?php
                $jsondata = file_get_contents("../database/inventory.json");
                $json = json_decode($jsondata, true);

                foreach($json as $products) {
                    if ($products["ID"] == 16) {
                        $currentPrice = $products["Current Price"];

                        echo "<h2> $$currentPrice each </h2>";
                    }
                }
                ?>
            </div>

            <!-- FEATURES -->
            <div class="flexbox-container">
                <div class="flexbox-item" id="flexbox-item-1">
                    <label for="">Add to Cart</label>
                    <i class="fas fa-shopping-cart" onclick="add2Cart()"></i>
                </div>

                <div class="flexbox-item" id="flexbox-item-2">
                    <label for="">Quantity</label>
                    <button id="minus" onclick="remove()">-</button>
                    <label for="" id="quantity">1</label>
                    <button id="plus" onclick="add()">+</button>
                    <label for="">Subtotal: </label>

                    <!-- Display the subtotal-->
                    <label for="" id="subtotalPrice" class="price1">$
                        
                        <?php
                        $jsondata = file_get_contents("../database/inventory.json");
                        $json = json_decode($jsondata, true);

                        foreach($json as $products) {
                            if ($products["ID"] == 16) {
                                $currentPrice = $products["Current Price"];
                                echo $currentPrice;
                            }
                        }
                        ?>
                    </label>
                </div>

                <div class="flexbox-item" id="flexbox-item-3">
                    <label for="">Remove item</label>
                    <i class="fas fa-trash" onclick="trash()"></i>
                </div>
            </div>

            <!-- DETAILED DESCRIPTION -->
            <div class="description">
                <button class="accordion">Detailed Description</button>
                <div class="panel">
                    <hr>
                    <p>Pepperoni and mozzarella cheese pizza on an oven-rise crust.</p>
                    <p>Product Number: 512940148123</p>
                    <hr>
                </div>
            </div>

        </div>

    </div>

    <!-- FOOTER -->
    <footer>
        <div id="information">
            <div id="about-us">
                <h1>ABOUT US</h1>
                <ul>
                    <li><a href="404_Error.html">Company Information</a></li>
                    <li><a href="404_Error.html">Charitable Contribution</a></li>
                    <li><a href="404_Error.html">Investor Relations</a></li>
                </ul>
            </div>
            <div id="customer-service">
                <h1>CUSTOMER SERVICE</h1>
                <ul>
                    <li><a href="ContactUs.html">Contact US</a></li>
                    <li><a href="404_Error.html">FAQ</a></li>
                    <li><a href="404_Error.html">Privacy Policy</a></li>
                    <li><a href="404_Error.html">Terms and Conditions</a></li>
                </ul>
            </div>
            <div id="online">
                <h1>ONLINE</h1>
                <ul>
                    <li><a href="404_Error.html">Online Grocery</a></li>
                    <li><a href="404_Error.html">Mobile Apply</a></li>
                    <li><a href="404_Error.html">Product Videos</a></li>
                    <li><a href="admin_login.html"> Admin login </a></li>
                </ul>
            </div>
            <div id="jobs">
                <h1>JOBS</h1>
                <ul>
                    <li><a href="404_Error.html">Jobs in stores</a></li>
                    <li><a href="404_Error.html">Careers at head office</a></li>
                </ul>
            </div>
        </div>

        <div id="copyright">
            <h6> &copy; Copyright Cloud 2021</h6>
        </div>

    </footer>

    <script type="text/javascript" src="../js/p3-frozen.js"></script>

</body>
</html>