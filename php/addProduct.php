<?php
    // Getting JSON file content
    $file_content = file_get_contents('../database/inventory.json');
    // Decoding JSON file into an array
    $inventory = json_decode($file_content, true);
    //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING IMPORTED DATA)
    // If required data (ID + Name) is inputted, add product
    if ($_POST['ID'] != null && $_POST['productName'] != null) {
        $newProduct = array('ID' => $_POST['ID'], 'Product Name' => $_POST['productName'], 'Quantity' => $_POST['quantity'], 
        'Original Price' => $_POST['originalPrice'], 'Current Price' => $_POST['originalPrice'], 'Image Location' => $_POST['imageLocation'], 'Description' => $_POST['description']);
        // Adding new product to inventory array
        array_push($inventory, $newProduct);
        //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING UPDATED DATA)
        // Encoding new inventory
        $json_updatedInv =  json_encode($inventory, JSON_PRETTY_PRINT);
        echo '<p> Adding product entry... </p>';
        // Overwriting old inventory with new inventory
        file_put_contents('../database/inventory.json', $json_updatedInv);
        // Redirecting back to inventory list
        echo '<script type="text/javascript"> window.location = "../php/P7.php" </script>';
    }
    // If required data not inputted, bring back to P8_addProduct.php
    else {
        echo "<p> Please enter product ID and name. </p>";
        echo "<form action='../php/P8_addProduct.php'> <input type='submit' name='back' value='Back'> </form>";
    }
?>
