
<?php

// Open the Users database to search for exising Usernames
$file = fopen("../database/users.csv", "r");

// Array to contain the existing Usernames
$usernames = array();

// The first line not is needed
fgets($file);


while (!feof($file)) {
    // Get a line of info
    $line = fgets($file);

    // Split the string into an array
    $keywords = preg_split("/[,]/", $line);

    // Get the Username at index 0
    array_push($usernames, strtolower($keywords[0]));

}

fclose($file);

if (isset($_POST["submit"])) {

    $username = strtolower($_POST["username"]);
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $item = $_POST["item"];
    $orderNumber = $_POST["order"];
    $message = $_POST["comments"];

    // If the user is an existing-user, then redirect to the order details page
    if (in_array($username, $usernames)) {
        
        if($username == "q.") {
            header("Location: ../html/P12-1.html");

        }
        else if($username == "duckymomo") {
            header("Location: ../html/P12-2.html");
        }

    } 
    else { // If the user is not an existing-user, then link to the sign-up page

        $message = "Not an existing user. Redirecting to the sign-up page.";

        echo "<script language='javascript'>
            alert('$message');
            window.location.replace('../html/P6.html');
            </script>";

    }

}

?>



