<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$file = fopen("../database/users.csv", "r");
unset($_SESSION['loggedIn']);
unset($_SESSION['admin']);
unset($_SESSION['username']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['password']);

if (isset($_REQUEST["sign-in"])) {

    $form_username = $_REQUEST["Username"];
    $form_password = $_REQUEST["Password"];

    if (($file = fopen("../database/users.csv", "r")) != FALSE){
        while (($user_data = fgetcsv($file, 1000, ",")) != FALSE){
            $users_array[]= $user_data;
        }
    }
    $users_number = count($users_array);

    foreach($users_array as $data){
        if($form_username == $data[0]){
            if($form_password == trim($data[3])){
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $data[0];
                $_SESSION['first_name'] = $data[1];
                $_SESSION['last_name'] = $data[2];
                $_SESSION['password'] = $data[3];
                if($data[0] == "Admin"){
                    $_SESSION['admin'] = true;
                }
                else{
                    $_SESSION['admin'] = false;
                }
                break;
            }
            else{            
            $_SESSION['loggedIn'] = false;
            }
        }
        else{
            $_SESSION['loggedIn'] = false;
        }
    }
}
if(isset($_SESSION['loggedIn'])){
    if($_SESSION['loggedIn'] == false){
        echo "<script type='text/javascript'>alert('Your username or password is incorrect, please try again !')
    window.location.replace('P5.php');</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('You are now logged-in ! Enjoy shopping !')
    window.location.replace('../php/P1.php');</script>";
    }
}

fclose($file);
?>

<head>
    <title>Login | Cloud</title>

    <!-- Meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cloud Online Grocery Website">
    <meta name="Author" content="M??lina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sabl??, Tommy Cao, Muhammad Mubashir">
    <meta name="Keywords" content="Cloud, Online Grocery">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="../css/P5-P6-style.css">

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
        <a href="../php/P1.php" class="display-4"> <span id="title">CLOUD</span> ONLINE GROCERY </a>
    </header>

    <!-- MENU -->
    <div id="menu">

        <a href="../php/P1.php"> <img src="../images/cloud.jpg" alt="grocery store logo" id="logo" class="center"> </a>

        <form action="" class="search-box" class="center">
            <input type="text" name="search" placeholder="Search Products">
            <button type="submit"> <i class="fa fa-search"></i> </button>
        </form>

        <form action="" class="icons" class="center">
            <a href="P5.php" name="sign-in"> <i class="fas fa-sign-in-alt"></i> Sign in </a>
            <a href="P6.php" name="sign-up"> <i class="fa fa-user-plus"></i> Sign Up </a>
            <a href="P4.php" name="shopping-cart"> <i class="fa fa-shopping-cart"></i>Cart</a>
        </form>

    </div>

    <!-- NAVIGATION BAR -->
    <nav class="navbar navbar-expand-lg bg-primary navbar-light">
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-5 dropdown"><a class="nav-link text-white dropdown-toggle" data-toggle="dropdown" href="#">AISLES <span class="caret"></span></a>
                    <ul class="dropdown-menu bg-gray">
                        <li><a href="../html/P2-1.html">Fruits & Vegetables</a></li>
                        <li><a href="../html/P2-2.html">Dairy & Eggs</a></li>
                        <li><a href="../html/P2-3.html">Beverages</a></li>
                        <li><a href="../html/P2-4.html">Meat & Poultry</a></li>
                        <li><a href="../html/P2-5.html">Frozen</a></li>
                        <li><a href="../html/P2-6.html">Snacks</a></li>

                    </ul>
                </li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="#">FLYER</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="#">RECIPES</a></li>
                <li class="nav-item mx-5"><a class="nav-link text-white" href="#">NEW PRODUCTS</a></li>
            </ul>
        </div>
    </nav>

    <!-- SIGN IN FORM -->
    <div class="container" id="register">
        <div class="title">
            <h2>Sign in:</h2>
        </div>
        <form action="" id="form">
            <?php if($_SESSION['loggedIn']==false){
                echo"$message";
            }?>
            <label>Username:</label>&nbsp;
            <input type="text" name="Username" onfocus="this.value=''" value="Username" required/>
            <br/><br/>        
            <label>Password:</label>&nbsp;
            <input type="password" name="Password" required>
            <br/><br/>
            <button type="submit" name="sign-in" class="btn btn-primary" id="Sign-In">Sign in</button>
            </form>
            <br/>
            <button class="btn btn-secondary" id="pswd_button">Forgot your password ?</button>
            <br/><br/>
            <div id="PopUp" class="popup">
                <div class="forgot_password">
                    <span class="exit">&times;</span>
                    <p><h3>We will send you a link to reset your password.</h3></p>
                    <br/>
                    <form>
                    <p><label>Your email address:</label>
                    <input type="text" name="email" onfocus="this.value=''" value="this.example@email.com" required>
                     </p><br/>
                    <p><button type="submit" name="submit" class="btn btn-primary" onclick="alert('We have sent you an email.')">Reset password</button></p>
                    </form>
                </div>
            </div>
        
        <br/><br/><br/> You don't have an account yet ? You can <a href="P6.php">log on here.</a>

    </div>

    <!-- FOOTER -->
    <footer>
        <div id="description">
            <div id="customer-service">
                <h1>CUSTOMER SERVICE</h1>
                <ul>
                    <li><a href="404_Error.html">Contact US</a></li>
                    <li><a href="404_Error.html">FAQ</a></li>
                    <li><a href="404_Error.html">Privacy Policy</a></li>
                    <li><a href="404_Error.html">Terms and Conditions</a></li>
                </ul>
            </div>
            <div id="about-us">
                <h1>ABOUT US</h1>
                <ul>
                    <li><a href="">Company Information</a></li>
                    <li><a href="">Charitable Contribution</a></li>
                    <li><a href="">Investor Relations</a></li>
                </ul>
            </div>
            <div id="online">
                <h1>ONLINE</h1>
                <ul>
                    <li><a href="">Online Grocery</a></li>
                    <li><a href="">Mobile Appy</a></li>
                    <li><a href="">Product Videos</a></li>
                </ul>
            </div>
            <div id="jobs">
                <h1>JOBS</h1>
                <ul>
                    <li><a href="">Jobs in stores</a></li>
                    <li><a href="">Careers at head office</a></li>
                </ul>
            </div>
        </div>

        <div id="copyright">
            <h6> &copy; Copyright Cloud 2021</h6>
        </div>

    </footer>

</body>
<script type="text/javascript">
var modal = document.getElementById("PopUp");

document.getElementById("pswd_button").onclick = function() {
  modal.style.display = "block";
}

document.getElementsByClassName("exit")[0].onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script type="text/javascript" src="../js/P3-meat + P5-P6.js"></script>
</html>