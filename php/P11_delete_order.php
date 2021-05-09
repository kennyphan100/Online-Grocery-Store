<?php
    session_start();
    if(!$_SESSION['admin'])
    {
        header('Location: P1.php');
    }

    if (!isset($_POST['deleteOrder'])) {
        die("No card found...");
    }else{
        $deleteRow = $_POST['deleteOrder'];
        echo "Card found... attempting to delete it";
        echo "'Card at row ' . $deleteRow";
        include("ReadFromCSV.php");
        
        unset($csv[$deleteRow]);

        $fileToWrite = fopen('../database/order_list.csv', 'w+');

        foreach($csv as $row)
        {
            fputcsv($fileToWrite, $row);
        }

        header('Location: P11.php');
        $_SESSION['admin'] = true;
        
}

?>