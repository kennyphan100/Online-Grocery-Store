<?php
    // Function to edit element with specific value
    function editElementWithValue($array, $key, $value) {
        foreach ($array as $subKey => $subArray) {
            if ($subArray[$key] == $value) {
                if($_POST['quantity'] != null) {
                    $array[$subKey]['Quantity'] = $_POST['quantity'];
                }
                if($_POST['currentPrice'] != null) {
                    $array[$subKey]['Current Price'] = $_POST['currentPrice'];
                }
                if($_POST['description'] != null) {
                    $array[$subKey]['Description'] = $_POST['description'];
                }
            }
        }
        return $array;
    }
    // Getting JSON file content
    $file_content = file_get_contents('../database/inventory.json');
    // Decoding JSON file into an array
    $inventory = json_decode($file_content, true);
    //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING IMPORTED DATA)
    // Edit information of the product that has the inputted ID from inventory array
    $newInventory = editElementWithValue($inventory, 'ID', $_POST['ID']);
    //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING UPDATED DATA)
    // Encoding new inventory
    $json_updatedInv =  json_encode($newInventory, JSON_PRETTY_PRINT);
    echo '<p> Editing product entry... </p>';
    // Overwriting old inventory with new inventory
    file_put_contents('../database/inventory.json', $json_updatedInv);
    // Redirecting back to inventory list
    echo '<script type="text/javascript"> window.location = "../php/P7.php" </script>';
?>