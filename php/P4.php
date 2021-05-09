<?php
ob_start();
session_start();
if(isset($_SESSION["productArray"])){
    $productArray = array();
    $productArray = $_SESSION["productArray"];
};
?>
<!DOCTYPE html>
<?php
    function totalPrice($quantity,$price){
        $price = trim($price,"$");
        $price = number_format((float)$price, 2, '.', '');
        return "$".$quantity*$price;

    }

?>


<html lang="en">


<head>
    <title>Cart | Cloud</title>

    <!-- Meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloud Online Grocery Website">
    <meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
    <meta name="Keywords" content="Cloud, Online Grocery">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/P1.css">
    <link rel="stylesheet" href="../css/P4.css">

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/5995e1d6ee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- <script src="../javascript/p3.js"></script> -->

</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <a href="../php/P1.php" class="display-4"> <span id="title">CLOUD</span> ONLINE GROCERY </a>
    </header>

    <!-- MENU -->
    <div id="menu">
        <div id="box">
            <a href="../php/P1.php"> <img src="../images/cloud.jpg" alt="grocery store logo" id="logo" class="center"> </a>

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
    <!-- Page Content -->
    <div class="cartContainer">
        <!-- Products in the Cart -->
        <div class="products" id="prod">
            <div class="heading">
                <h2>My Cart</h2>
            </div>
            <?php
            function products(){
                global $productArray;
            if(!empty($productArray)){
                foreach($productArray as $value){
                    
                    if($value["quantity"] !=0){
                        echo '   
                    <form action="" method="POST"> 
                    <div class="item">    
                    <div class="image">
                        <img src='.$value["picture"].' alt="404" id="productImage">
                    </div>
                    <div class="productRow">
                        <div class="productName">
                            <h2 name = "productName" value='.$value["productName"].'>'.$value["productName"].'</h2>
                            <p>'.$value["priceTag"].'</p>
                        </div>
                        <div class="addProduct">
                            <button class="btn btn-light" style="vertical-align: middle;" onclick="add(this)" name="add" value ="'.$value["productName"].'">+</button>
                            <span name = "quantity" value="'.$value["quantity"].'">'.$value["quantity"].'</span>
                            <button class="btn btn-light" onclick="sub(this)" name="sub" value ="'.$value["productName"].'">-</button>
                        </div>
                        <div class="price">
                            <h3>'.$value["price"].'</h3>
                        </div>
                        <div class="totalPrice">
                            <h3>'.totalPrice($value["quantity"],$value["price"]).'</h3>
                        </div>
                        <div class="delItem">
                            <button class="btn btn-outline-light" onclick="deleteItem(this)" type="submit" name="del" value="'.$value["productName"].'"/>
                            <img src="../images/delete.png" alt="404" id="delBtn" >
                            </button>
                        </div>
                    </div>
                    </div>
                    </form>';
                    }
                }
            }
        }
        ?>
        <?php
        products();
        ?>
            </div>
            <?php
            if(isset($_SESSION["productArray"])){
                $arr = $_SESSION["productArray"];
            }
            if(isset($_POST["del"])){
                $fruit = $_POST["del"];
                foreach($arr as $key => $value){
                    if($value["productName"] == $fruit){
                        unset($_SESSION["productArray"][$key]);
                        header( "location: P4.php" );
                        
                        
                    }
                }

            }
            if(isset($_POST["add"])){
                $fruit = $_POST["add"];
                foreach($arr as $key => $value){
                    if($value["productName"] == $fruit){
                        $_SESSION["productArray"][$key]["quantity"] = $_SESSION["productArray"][$key]["quantity"]+1;
                        header( "location: P4.php" );
                    }
                }
            }
            if(isset($_POST["sub"])){
                $fruit = $_POST["sub"];
                foreach($arr as $key => $value){
                    if($value["productName"] == $fruit){
                        $_SESSION["productArray"][$key]["quantity"] = $_SESSION["productArray"][$key]["quantity"]-1;
                        header( "location: P4.php" );
                    
                        

                    }
                }
            }
            ?>

        <!-- total amount -->
        <div class="amount">
            <div class="bill">
                <hr>
                <h2>Cart Summary</h2>
                <hr>
                <!-- Bootstrap dt and dl tag -->
                <dl class="row total">
                    <dt class="col-sm-3">Subtotal</dt>
                    <dl class="col-sm-9">$6.99</dl>
                    <dt class="col-sm-3">Taxes</dt>
                    <dl class="col-sm-9">$0.00</dl>
                    <dt class="col-sm-3">Extra charges</dt>
                    <dl class="col-sm-9">$5.00</dl>
                    <hr>
                    <dt class="col-sm-3">Total</dt>
                    <dl class="col-sm-9">$6.99</dl>
                </dl>
                <div class="guidelines">
                    <p>
                        *Your order total may vary based on savings, promotions, actual weight of the products and prices in effect at the time of order pickup or delivery. The product availability and prices may vary based on the selected store and service.
                    </p>
                </div>

            </div>
            <!-- Bootstrap used for buttons -->
            <div class="buttons">
                <form action="" method="POST">
                    <div class="checkout">
                        <button  name="checkout" value="checkout" class="btn btn-primary" onclick="checkout()">CHECK OUT</button>
                    </div>
                    <div class="continueShopping">
                        <a href="../html/P2-1.html" class="btn btn-primary">Continue Shopping</a>

                    </div>
                </form>
            </div>
        </div>
        </div>
        <?php
        if(isset($_POST["checkout"])){
            if(empty($_SESSION["productArray"])){
                echo '<script language="javascript">';
                echo 'alert("Your cart is Empty")';
                echo '</script>';
            }
            else if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){
                $arr = $_SESSION["productArray"];
                $orderId= "#ABC".rand(10,1000);
                $apple =0;
                $kiwi =0;
                $avacado =0;
                $firstName = $_SESSION["first_name"];
                $lastName = $_SESSION["last_name"];
                foreach($arr as $key){
                    if($key["productName"] == "Apple"){
                        $apple = $key["quantity"]  ;
                    }
                    if($key["productName"] == "Kiwi"){
                        $kiwi = $key["quantity"];

                    }
                    if($key["productName"] == "Avacado"){
                        $avacado = $key["quantity"];
                    }

                }
                $firstName = trim($firstName);
                $lastName = trim($lastName);
                $array = array($orderId,$firstName,$lastName,$apple,$kiwi,$avacado);
                $file = fopen("../database/order_list.csv","a");
                fputcsv($file,$array);
                unset($_SESSION['productArray']);
                echo '<script language="javascript">';
                echo 'alert("Your Order have been successfully place")';
                echo '</script>';
                header( "Refresh:1; url=P1.php", true, 303);
                
                
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Please Login to Place order")';
                echo '</script>';
            };
        }
        
        

        ?>

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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <script src="../js/p4.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>
