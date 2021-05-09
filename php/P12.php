<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        echo"<script type='text/javascript'>alert('You are not an admin... Access denied !')
        window.location.replace('http://localhost/php/P1.php');</script>";
    }
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
    <meta name="description" content="Edit Order List for Order 1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="Cloud, Online Grocery">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud | Edit Order</title>

    <!-- Font Awesome Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Bootstrap JS Inquiries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="img/jpg" href="../images/cloud.png" />
    <link rel="stylesheet" type="text/css" href="../css/P12.css" />
    <script type="text/javascript" src="../js/P12.js"></script>
</head>

<body>
    <?php
    include("backstore_header_navbar.php");
    include("../php/ReadFromCSV.php");

    if (isset($_POST['order'])) {
        $row = $_POST['order'];
        $orderID = $csv[$row][0];
        $firstName = $csv[$row][1];
        $lastName = $csv[$row][2];
        $username = $csv[$row][6];
    ?>

        <div class="card">
            <div class="card-body">
                <img class="avatar" src="../images/default_avatar.png" />
                <h4 class="card-title"><?php echo $username; ?></h4>
                <h6 class="card-title"><?php echo $firstName." ".$lastName; ?></h6>
                <p1 class="card-text" id="Order ID">Order ID: <?php echo $orderID; ?></p1>
                <br />
                <br />
                <form action = "P12_editOrder.php" method = "post">
                <table id="order_table">
                    <tr>
                        <th style="text-align: left;">Item</th>
                        <th>Edit Amount</th>
                        <th>Delete?</th>
                    </tr>
                    
                    <?php
                    for ($column = 3; $column < 6; $column++) {
                        $itemName = $csv[0][$column];
                        $itemAmount = $csv[$row][$column];
                        if (!($itemAmount == 0)) {
                    ?>
                        <tr id=<?php echo $csv[0][$column]; ?>>
                            <td id="item"> 
                            <img src=<?php echo "../images/" . $csv[0][$column] . ".jpg"; ?> id="item" class="center">
                                <?php echo $csv[0][$column]; ?>
                            </td>
                            <td id=<?php echo "amount_" . $csv[0][$column]; ?>>
                                <input type = "text" placeholder = "> 0" pattern = "^[1-9][0-9]*$" name = "<?php echo $csv[0][$column];?>" value = "<?php echo $csv[$row][$column];?>"required>
                            </td>
                            <td><button class="button" type="button" id="delete" onclick=<?php echo "deleteItem('" . $csv[0][$column] . "')"; ?>>Delete</button></td>
                        </tr>
                <?php
                    }
                }}
                else{
                    ?>
                    <form action = "P12_editOrder.php" method = "post">
                    <div class="card">
                        <div class="card-body">
                        <img class="avatar" src="../images/default_avatar.png" />
                        <h4 class="card-title"><input type = "text" placeholder = "First Name" name = "firstName" required></h4>
                        <h6 class="card-title"><input type = "text" placeholder = "Last Name" name = "lastName"required></h6>
                        <p1 class="card-text" id="Order ID"><input type = "text" name = "OrderID" pattern = "#[A-Z]{4}[0-9]{4,}"placeholder = "'#NOCR'NNNN" required></p1>
                        <br />
                        <br />
                        <table id="order_table">
                        <tr>
                            <th style="text-align: left;">Item</th>
                            <th>Edit Amount</th>
                            <th>Delete?</th>
                        </tr>  
                    <?php
                }?>
                    
                </table>
                <br />
                <button class="btn btn-primary" type="submit" name = "orderID" value = <?php echo $orderID;?>>
                    Save
                </button>
                </form>
                
                <table>
                    <th style="text-align: left">Items to Add</th><br />
                    <tr>
                        <td id="item_name">Item
                            <select name="groceries" id="new_item">
                                <option value="Apple">Apples</option>
                                <option value="Avocado">Avocado</option>
                                <option value="Kiwi">Kiwi</option>
                            </select>
                        </td>
                        <td id="item_amount">Amount<br />
                            <input type="text" id="number_item">
                        </td>
                        <td>
                            <button class="button" type="button" onclick="addItem()">
                                Add Item
                            </button>
                        </td>
                    </tr>
                </table>
                

            </div>
        </div>
        <footer style="text-align:center;">
            <div id="copyright">
                <h6> &copy; Copyright Cloud 2021</h6>
            </div>
        </footer>
</body>

</html>