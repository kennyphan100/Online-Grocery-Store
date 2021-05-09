<?php
    $file = fopen('../database/order_list.csv','r+');
    $numberOfRows = 0;

    while(!feof($file))
    {
        $row=fgetcsv($file);
        $csv[$numberOfRows]=$row;
        $numberOfRows++;
    }
    fclose($file);

    /*Reading from order_list.csv and displaying orders correctly.
     $numberOfColumns = count($csv[0]);
     for($i = 1; $i < $numberOfRows; $i++)
     {
         for($j = 0; $j < $numberOfColumns; $j++)
         {
             if(!($csv[$i][$j] == '0' || $csv[$i][$j] == "" ))
             {
                 echo ($csv[0][$j] . ": " . $csv[$i][$j] . "<br />");
             }
         }
         echo ("<br />");
    */
?>