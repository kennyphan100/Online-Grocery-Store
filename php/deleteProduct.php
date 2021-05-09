<?php
    // Function to remove element with specific value
    function removeElementWithValue($array, $key, $value) {
        foreach ($array as $subKey => $subArray) {
            if ($subArray[$key] == $value) {
                unset($array[$subKey]);
            }
        }
        return $array;
    }
    // Getting JSON file content
    $file_content = file_get_contents('../database/inventory.json');
    // Decoding JSON file into an array
    $inventory = json_decode($file_content, true);
    //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING IMPORTED DATA)
    // Remove the product that has the inputted ID from inventory array
    $newInventory = removeElementWithValue($inventory, 'ID', $_POST['ID']);
    //echo '<pre>' . print_r($inventory, true) . '</pre>'; //(FOR VIEWING UPDATED DATA)
    // Encoding new inventory
    $json_updatedInv =  json_encode($newInventory, JSON_PRETTY_PRINT);
    echo '<p> Deleting product entry... </p>';
    // Overwriting old inventory with new inventory
    file_put_contents('../database/inventory.json', $json_updatedInv);
    // Redirecting back to inventory list
    echo '<script type="text/javascript"> window.location = "../php/P7.php" </script>';
?>