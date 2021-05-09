<!doctype html>
<html lang="en">
<?php
session_start();
$string = file_get_contents("../database/inventory.json");
$name ="";
$pic = "";
$price = "";
$priceTag= "";
$discription="";
$nameOfProduct = "Avacado";
if($string == false){
    echo "Error";

}
$json = json_decode($string,true);
if($json == null){
    echo "Error";
}
else{
    foreach($json as $value){
        if($value["Product Name"] == $nameOfProduct){
            $pic = $value["Image Location"];
            $name = $nameOfProduct;
            $price = $value["Current Price"];
            $priceTag = "$".$value["Current Price"];
            $discription = $value["Description"];
        }
    }

}
function checkArray($array ,$quantity){
    global $nameOfProduct;
    $noOfIteration =0;
    foreach($array as $value){
        if(strcmp($value["productName"],$nameOfProduct) == 0){
            $array[$noOfIteration]["quantity"] = $quantity;
            $_SESSION["productArray"] = $array;
            return true;
        }
        $noOfIteration++;
        
    }
    return false;
}

if(isset($_SESSION["productArray"])){
    if(isset($_GET["quantity"])){
        $quantity = $_GET["quantity"];
            $array = $_SESSION["productArray"];
            if(!checkArray($array,$quantity)){
                $arr1 = array();
                $arr1["productName"] = $nameOfProduct;
                $arr1["price"] = $price;
                $arr1["priceTag"] = $priceTag;
                $arr1["quantity"]  = $quantity;
                $arr1["picture"] = $pic;
                array_push($array,$arr1);
                $_SESSION["productArray"] = $array;
            }
        
        
        
    }
}
else{
    $_SESSION["productArray"] = array();
}
// print_r($_SESSION["productArray"]);
?>
<head>
    <title><?php echo $nameOfProduct ?> | Cloud</title>

    <!-- Meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloud Online Grocery Website">
    <meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
    <meta name="Keywords" content="Cloud, Online Grocery">

    <!-- Font Awesome CSS -->
    <script src="https://kit.fontawesome.com/5995e1d6ee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../javascript/p3.js"></script>

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/P1.css">
    <link rel="stylesheet" href="../css/P3-fruits.css">

</head>

<body>

    <!-- Navbar -->
    <!-- HEADER -->
    <header id="header">
        <a href="P1.html" class="display-4"> <span id="title">CLOUD</span> ONLINE GROCERY </a>
    </header>

    <!-- MENU -->
    <div id="menu">
        <div id="box">
            <a href="P1.html"> <img src="../images/cloud.jpg" alt="grocery store logo" id="logo" class="center"> </a>

            <form action="" class="search-box" class="center">
                <input type="text" name="search" placeholder="Search Products">
                <button type="submit"> <i class="fa fa-search"></i> </button>
            </form>

            <form action="" class="icons" class="center">
            <?php if(isset($_SESSION['loggedIn']) ){
                        if($_SESSION["loggedIn"] == true){
                        echo"<a href='../php/P5.php' name='log-out'><i class='fas fa-sign-in-alt'></i>Log out</a>";
                        }
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
                <li class="nav-item mx-5 dropdown"><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">AISLES<span class="caret"></span></a>
                    <ul class="dropdown-menu bg-gray">
                        <li><a href="../html/P2-1.html">Fruits & Vegetables</a></li>
                        <li><a href="../html/P2-2.html">Dairy & Eggs</a></li>
                        <li><a href="#">Beverages</a></li>
                        <li><a href="#">Meat & Poultry</a></li>
                        <li><a href="#">Frozen</a></li>
                        <li><a href="#">Snacks</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">FLYER</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">RECIPES</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="404_Error.html">NEW PRODUCTS</a></li>
            </ul>
        </div>
    </nav>

    <!--  -->
    <form action="" method="get">
        <div class="productCard">
            <div class="image">
                <img <?php echo "src=".$pic.""?> alt="404" class="img-responsive  productImage">
            </div>
            <div class="container">
                <div class="heading">
                    <h1><?php echo $nameOfProduct?></h1>
                    <hr/>
                </div>
                <div class="text">
                    <p><?php echo $priceTag?></p>
                </div>
                <div class="price">
                    <h2><?php echo $price?></h2>
                </div>
                <div class="dropdown">
                    <select name="quantity" id="quantity" onchange="changeValue(this)">
                    <?php for($i= 0;$i<15;$i++){
                        if($i == $quantity){
                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                        }
                        else{
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }

                    }?>

                      </select>
                </div>
                <div class="btn">
                    <button class="cartBtn" onclick="addToCart()" type="$_POST">
                        <img src="../images/shopping-cart.png" alt="404" class="cart">
                    </button>
                </div>
                <div class="discription">
                    <button onclick="dropdown()" type="button">
                        <div class="discription2">
                            <h1>Product discription</h1>
                        </div>     
                    </button>
                    <hr/>
                    <p style="visibility: hidden;">
                        <?php echo $discription?>
                    </p>
                </div>
            </div>
        </div>


    </form>

    <div class="heading1">
        <h1>Frequently Bought Together</h1>
    </div>
    <div class="container2">
        <div class="item1">
            <div class="card " style="width: 18rem;">
                <a href="#">
                    <img class="card-img-top" src="../images/avocado.jpg" alt="Card image cap" href="#">
                </a>

                <div class="card-body">
                    <h5 class="card-title ">Avacado</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <span class="card-text price ">$20.0</span>
                <div class="card-body">
                    <button class="cartBtn">
                        <img src="../images/shopping-cart.png" alt="404" class="cart">
                    </button>

                </div>
            </div>
        </div>
        <div class="item1">
            <div class="card" style="width: 18rem;">
                <a href="#">
                    <img class="card-img-top" src="../images/grapes.jpg" alt="Card image cap" href="#">
                </a>

                <div class="card-body">
                    <h5 class="card-title ">Grapes</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <span class="card-text price ">$19.0</span>
                <div class="card-body">
                    <button class="cartBtn">
                        <img src="../images/shopping-cart.png" alt="404" class="cart">
                    </button>

                </div>
            </div>
        </div>
        <div class="item1">
            <div class="card" style="width: 18rem;">
                <a href="#">
                    <img class="card-img-top" src="../images/broccoli.jpg" alt="Card image cap" href="#">
                </a>

                <div class="card-body">
                    <h5 class="card-title ">Broccoli</h5>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up the bulk of the card's content.
                    </p>
                </div>
                <span class="card-text price ">$25.0</span>
                <div class="card-body">
                    <button class="cartBtn">
                        <img src="../images/shopping-cart.png" alt="404" class="cart">
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
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
                    <li><a href="404_Error.html">Contact US</a></li>
                    <li><a href="404_Error.html">FAQ</a></li>
                    <li><a href="404_Error.html">Privacy Policy</a></li>
                    <li><a href="404_Error.html">Terms and Conditions</a></li>
                </ul>
            </div>
            <div id="online">
                <h1>ONLINE</h1>
                <ul>
                    <li><a href="404_Error.html">Online Grocery</a></li>
                    <li><a href="404_Error.html">Mobile Appy</a></li>
                    <li><a href="404_Error.html">Product Videos</a></li>
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
    <script src="../js/p3-fruits.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>
