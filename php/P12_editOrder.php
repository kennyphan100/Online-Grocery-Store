<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        echo"<script type='text/javascript'>alert('You are not an admin... Access denied !')
        window.location.replace('http://localhost/php/P1.php');</script>";
    }
    
    include("ReadFromCSV.php");
    $orderID = $_POST['orderID'];
    unset($_POST['orderID']);
    echo $orderID . "<br>";

    function editCSV($csv,$row)
    {
        $column = 3;
        while($column != count($csv[$row])){
            $itemName = $csv[0][$column];
            if(!isset($_POST[$itemName]))
            {
                $csv[$row][$column] = null;
            }
            else
            {
                $csv[$row][$column] = $_POST[$itemName];
            }
            $column++;
        }
        writeToCSV($csv);
    }

    function writetoCSV($csv)
    {
        $fileToWrite = fopen('../database/order_list.csv', 'w+');
        foreach($csv as $row)
        {
            fputcsv($fileToWrite, $row);
        }
        fclose($fileToWrite);
        echo"<script type='text/javascript'>window.location.replace('http://localhost/php/P11.php');</script>";
    }

?>
<?php
    if(isset($_POST['firstName']) && isset($_POST['lastName']))
    {
        $orderID = $_POST['OrderID'];
        $numberOfRows++;
        $csv[$numberOfRows][0] = $orderID;
        $csv[$numberOfRows][1] = $_POST['firstName'];
        $csv[$numberOfRows][2] = $_POST['lastName'];
        $csv[$numberOfRows][3] = $_POST['Apple'];
        $csv[$numberOfRows][4] = $_POST['Kiwi'];
        $csv[$numberOfRows][5] = $_POST['Avocado'];
        writetoCSV($csv);
    }
    else
    {
        for($row = 0; $row < $numberOfRows; $row++)
        {
            if ($orderID == $csv[$row][0]){
                break;
            }
        }
        editCSV($csv,$row);
    }
?>  