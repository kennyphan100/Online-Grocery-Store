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
    <link rel="stylesheet" href="css/P1.css">

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/5995e1d6ee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/weeklyDeals.js"></script>

</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <a href="php/p1.php" class="display-4"> <span id="title">CLOUD</span> ONLINE GROCERY </a>
    </header>

    <!-- MENU -->
    <div id="menu">
        <div id="box">
            <a href="php/p1.php"> <img src="images/cloud.jpg" alt="grocery store logo" id="logo" class="center"> </a>

            <form action="" class="search-box" class="center">
                <input type="text" name="search" placeholder="Search Products">
                <button type="submit"> <i class="fa fa-search"></i> </button>
            </form>
            
            <form action="" class="icons" class="center">
                <?php if($_SESSION['loggedIn'] == true){
                    echo"<a href='php/P5.php' name='log-out'><i class='fas fa-sign-in-alt'></i>Log out</a>";
                }
                else{
                    echo"<a href='php/P5.php' name='sign-in'><i class='fas fa-sign-in-alt'></i> Sign in</a>";
                    echo"<a href='php/P6.php' name='my-list'><i class='fas fa-user-plus'></i> Sign up</a>";
                }
                ?>
                
                <a href="php/P4.php" id="shopping-cart"> <i class="fa fa-shopping-cart"></i>Cart</a>
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
                        <li><a href="html/P2-1.html">Fruits & Vegetables</a></li>
                        <li><a href="html/P2-2.html">Dairy & Eggs</a></li>
                        <li><a href="html/P2-3.html">Beverages</a></li>
                        <li><a href="html/P2-4.html">Meat & Poultry</a></li>
                        <li><a href="html/P2-5.html">Frozen</a></li>
                        <li><a href="html/P2-6.html">Snacks</a></li>

                    </ul>
                </li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">FLYER</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">RECIPES</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">NEW PRODUCTS</a></li>
            </ul>
        </div>
    </nav>

    <!-- COVID NEWS ARTICLE -->
    <div id="covid-news">
        <a href="404_Error.html" class="button">INFORMATION ABOUT COVID-19</a>
    </div>

    <!-- MAIN SECTION -->
    <section id="main-section">
        <div id="delivery">
            <a href="">
                <h2>FREE HOME DELIVERY</h2>
                <p>*free delivery on orders $50+*</p>
                <img src="images/freedelivery.png" alt="free delivery image"> <br>
                <a href="404_Error.html" class="btn btn-dark" role="button">Shop now!</a>
            </a>
        </div>
    </section>

    <!-- WEEKLY DEALS-->
    <div id="featured-products" class="row">
        <h2 id="title">WEEKLY DEALS</h2>

        <!-- CHECK IF A PRODUCT IS ON SALE (IF YES, THEN PUT INTO WEEKLY DEALS) -->
        <?php
        $jsondata = file_get_contents("database/inventory.json");
        $json = json_decode($jsondata, true);

        foreach($json as $products) {

            // Check if the product is on sale
            if ($products["Original Price"] > $products["Current Price"]) {
                $name = "'" . $products["Product Name"] . "'";
                $price = $products["Current Price"];
                $image = "'" . $products["Image Location"] . "'";

                // Add the item to the Weekly Deals section
                echo "<script type = 'text/javascript'>
                    addProductToWeeklyDeals($name, $price, $image);
                    </script>";
            }

        }
        ?>

    </div>

    <!-- SOCIAL MEDIA ARTICLE-->
    <div id="article">
        <a href="html/404_Error.html"> <i class="fa fa-youtube-play"></i></a>
        <a href="html/404_Error.html"> <i class="fa fa-twitter"></i></a>
        <a href="html/404_Error.html"> <i class="fa fa-facebook-official"></i></a>
        <a href="html/404_Error.html"> <i class="fa fa-instagram"></i></a>
    </div>

    <!-- FOOTER -->
    <footer>
        <div id="information">
            <div id="about-us">
                <h1>ABOUT US</h1>
                <ul>
                    <li><a href="html/404_Error.html">Company Information</a></li>
                    <li><a href="html/404_Error.html">Charitable Contribution</a></li>
                    <li><a href="html/404_Error.html">Investor Relations</a></li>
                </ul>
            </div>
            <div id="customer-service">
                <h1>CUSTOMER SERVICE</h1>
                <ul>
                    <li><a href="html/ContactUs.html">Contact US</a></li>
                    <li><a href="html/404_Error.html">FAQ</a></li>
                    <li><a href="html/404_Error.html">Privacy Policy</a></li>
                    <li><a href="html/404_Error.html">Terms and Conditions</a></li>
                </ul>
            </div>
            <div id="online">
                <h1>ONLINE</h1>
                <ul>
                    <li><a href="html/404_Error.html">Online Grocery</a></li>
                    <li><a href="html/404_Error.html">Mobile Apply</a></li>
                    <li><a href="html/404_Error.html">Product Videos</a></li>
                    <li><a href="index.html"> Admin login </a></li>
                </ul>
            </div>
            <div id="jobs">
                <h1>JOBS</h1>
                <ul>
                    <li><a href="html/404_Error.html">Jobs in stores</a></li>
                    <li><a href="html/404_Error.html">Careers at head office</a></li>
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