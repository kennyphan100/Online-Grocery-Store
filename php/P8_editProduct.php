<!DOCTYPE html>
<html lang = "en">

<head>

    <title>Edit Product Page</title>

    <!-- Meta tags-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Cloud Online Grocery Website">
	<meta name="Author" content="Mélina Deneuve, Kenny Phan, Joe El-Khoury, Titouan Sablé, Tommy Cao, Muhammad Mubashir">
	<meta name="Keywords" content="Cloud, Online Grocery">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../css/P1.css">
    <link rel="stylesheet" type="text/css" href="../css/P7-8.css">
    <link rel="stylesheet" type="text/css" href="../css/P11.css">

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/5995e1d6ee.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    
    <!-- Header -->
    <?php include '../php/backheadnavbar_P7-8.php' ?>

    <!-- Page content -->
    <div style="text-align:center;">

        <!-- Getting needed inventory info -->
        <?php
            $file_content = file_get_contents('../database/inventory.json');
            $inventory = json_decode($file_content, true);
            //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING IMPORTED DATA)
            $arrayData = $inventory;
            // Removing unneeded data keys
            foreach (array_keys($arrayData) as $key) {
                unset($arrayData[$key]['Image Location']);
            }
            //print_r($arrayData); //(FOR VIEWING NEEDED DATA IN INVENTORY LIST)
        ?>

        <!-- Table title -->
        <p><h5> Inventory List </h5></p>
        <!-- Table -->
        <?php if (count($arrayData) > 0): ?>
            <table>
                <!-- Table header -->
                <tr>
                    <th><?php echo implode('</th><th>', array_keys(current($arrayData))); ?></th>
                </tr>
                <!-- Table data for each product -->
                <?php foreach ($arrayData as $row): array_map('htmlentities', $row); ?>
                    <tr>
                        <td><?php echo implode('</td><td>', $row); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>

        <br>

        <p> Enter the new information of the product </p>
        <form action="../php/editProduct.php" method="post">
            <input type="text" class="form-control" placeholder="Product ID (required)" id="ID" name="ID"/>
            <input type="number" class="form-control" placeholder="New quantity" id="quantity" name="quantity"/>
            <input type="number" step="0.01" class="form-control" placeholder="New price" id="currentPrice" name="currentPrice"/>
            <input type="text" class="form-control" placeholder="Updated description" id="description" name="description"/>
            <!-- Button to delete -->
            <button type="submit" id="editButton" class="button button6"> <i class='fas fa-edit'></i> Edit product </button>
        </form>
        <!-- Button to cancel -->
        <button type="button" onclick="location.href = '../php/P7.php';" id="cancelButton" class="button7"> <i class="fas fa-times"></i> Cancel </button>

        <br><br><br><br>

    </div>

    <!-- Footer -->
    <footer>
        <div id="copyright">
            <h6> &copy; Copyright Cloud 2021</h6>
        </div>
    </footer>

</body>

</html>