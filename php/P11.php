<?php
    session_start();
    include("ReadFromCSV.php");
    
    if(!$_SESSION['admin'])
    {
        echo"<script type='text/javascript'>alert('You are not an admin... Access denied !')
        window.location.replace('http://localhost/php/P1.php');</script>";
    }
    $_SESSION['admin'] = true;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cloud | Order List</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
    <meta name="description" content="Order List Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="Cloud, Online Grocery">

    <!-- Font Awesome Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Bootstrap JS Inquiries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <link rel="shortcut icon" type="img/jpg" href="../images/cloud.jpg" />
    <link rel="stylesheet" type="text/css" href="../css/P11.css" />

    <script type="text/javascript" src="../js/P11.js"></script>
</head>

<body>

    <?php
    include("backstore_header_navbar.php");
    if (empty($csv)) {
        echo "<h1>There are no orders :(</h1>";
    } else {
        for ($row = 1; $row < $numberOfRows-1; $row++) {
            $orderID = $csv[$row][0];
            $firstName = $csv[$row][1];
            $lastName = $csv[$row][2]; 
            $username = $csv[$row][6];
            ?>
            <div class="card" id="<?php echo $orderID; ?>">
                <div class="card-body">
                    <img class="avatar" src="../images/default_avatar.png">
                    <h4 class="card-title" id="FirstName"><?php echo $username; ?></h4>
                    <h6 class="card-title" id="LastName"><?php echo $firstName . " ". $lastName; ?></h6>
                    <p1 class="card-text" id="Order ID">Order ID: <?php echo $orderID; ?></p1>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo ($firstName.$lastName); ?>" aria-expanded="false" aria-controls="collapseExample">
                        Show Order Info
                    </button>
                    
                    <form action = "P11_delete_order.php" method = "post">
                        <button class="btn btn-primary" type="submit" name = "deleteOrder" value = <?php echo $row;?> >Cancel Order</button>
                    </form>
                    
                    <form action = "P12.php" method = "post">
                        <button class="btn btn-primary" type="submit" name = "order" placeholder = "Edit Order" value = <?php echo $row;?>>
                        Modify Order
                        </button>
                    </form>
                    <div class="collapse" id="<?php echo ($firstName.$lastName); ?>">
                        <table>
                            <tr>
                                <th style="text-align: left;">Item</th>
                                <th style="text-align: right;">Price</th>
                            </tr>

                            <?php
                            $totalPrice = 0;
                            for ($column = 3; $column < 6; $column++) {
                                $itemName = $csv[0][$column];
                                $itemAmount = $csv[$row][$column];
                                $price = 3.99 * $itemAmount;
                                $totalPrice += round($price, 2);
                                if (!($itemAmount == 0)) {
                            ?>
                                    <tr>
                                        <td id="item"> <img src=<?php echo "../images/" . $itemName . ".jpg"; ?> id="item" class="center">
                                            <?php echo $itemAmount . " " . $itemName; ?>
                                        </td>
                                        <td id="price">
                                            <strong><?php echo("$" . $price);?></strong>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </table>
                        <div class="p">
                            <p class="Total-Price">
                                <strong id="TotalPrice">
                                    <br />
                                    <?php echo "Before Tax: $" . $totalPrice; ?>
                                    <br />
                                    <?php $tax = round($totalPrice * 0.15, 2);
                                    echo "Tax: $" . $tax; ?>
                                    <br />
                                    <?php echo "Total: $" . ($tax + $totalPrice); ?>
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

       
    <?php }?>

    <br>
    <footer style="text-align:center;">
        <div id="copyright">
            <h6> &copy; Copyright Cloud 2021</h6>
        </div>
    </footer>
</body>

</html>