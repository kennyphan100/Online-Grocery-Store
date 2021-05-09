<!-- This php file takes inputs from the form of header.php and creates a new user in the database -->
<?php

    if (isset($_POST['submit'])) {
        include_once 'dbh.php';
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $first = $_POST['first'];
        $last = $_POST['last'];
        $email = "bob";

        if (empty($username) || empty($password) || empty($first) || empty($last)) {
            header ("Location: header.php?signup=empty");
        }
        else {
            // if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //     header ("Location: header.php?signup=invalidemail");
            // }
            // else {
            //     echo "Sign up the user!";
            // }
        }
    }
    else {
        header("Location: header.php?signup=error");
    }

    // $username = mysqli_real_escape_string($con, $_POST['user']);
    // $password = mysqli_real_escape_string($con, $_POST['pass']);
    // $first = mysqli_real_escape_string($con, $_POST['first']);
    // $last = mysqli_real_escape_string($con, $_POST['last']);

    // WRITE DATA TO DATABASE FROM A FORM (LESS SECURE)
    // $sql = "INSERT INTO users (username, password, firstname, lastname) VALUES ('$username', '$password', '$first', '$last');";
    // mysqli_query($con, $sql);

    // WRITE DATA TO DATABASE FROM A FROM USING PREPARED STATEMENTS (MORE SECURE)
    $sql = "INSERT INTO users (username, password, firstname, lastname) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Error";
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $first, $last);
        mysqli_stmt_execute($stmt);
    }

    header("Location: header.php?signup=success");
?>