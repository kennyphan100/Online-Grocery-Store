<!DOCTYPE html>
<html lang="en">
	<head> 

		 <title>User list</title>
	    
	    	  <!-- Meta tags-->
		  <meta charset="UTF-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1.0">
		  <meta name="description" content="Cloud Online Grocery Website">
		  <meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
		  <meta name="Keywords" content="Cloud, Online Grocery">
	    
		 <!-- For the sytle of this page, I just used the style of the person that did the item list. It looks good and I thought it would be better if I didn't do
			something completly different (since this web page needs to have the same style as the item page).-->
       		    <!-- Custom Stylesheet -->
	    <link rel="stylesheet" href="../css/P1.css">
	    <link rel="stylesheet" type="text/css" href="../css/P9.css">

	    <!-- Font Awesome CDN -->
	    <script src="https://kit.fontawesome.com/5995e1d6ee.js" crossorigin="anonymous"></script>

	    <!-- Bootstrap CDN -->
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<!-- Custom Scripts -->
		<script src="../js/P9.js"></script>

	</head>

	<body>

        <header id="header">
            <a href="P1.html"> Cloud Grocery Orders </a>
        </header>

        <nav class="navbar navbar-light navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../images/cloud.jpg" id="logo" type="image/jpg" class="align-top">
                </a>
                <form class="search">
                    <span class="fa fa-search"></span>
                    <input class="ID_Search" type="search" placeholder="Order ID Search">
                </form>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class='nav-link' href="P5.html">Login</a>
                        <a class="nav-link" href="P1.html">Homepage</a>
                        <a class="nav-link" href="../php/P7.php">Product List</a>
                        <a class="nav-link active" aria-current="page" href="#">User List</a>
                        <a class="nav-link" href="P7.html">Order List</a>
                    </div>
                </div>
            </div>
        </nav>