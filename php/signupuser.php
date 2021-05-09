<!-- This php file takes inputs from the form of header.php and creates a new user in the database -->
<?php
    include_once 'dbh.php';
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $first = $_POST['FirstName'];
    $last = $_POST['LastName'];
    $email = $_POST['email'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $tel3 = $_POST['tel3'];
    $phone = $tel1 . "-" . $tel2 . "-" . $tel3;

    // WRITE DATA TO DATABASE FROM A FROM USING PREPARED STATEMENTS
    $sql = "INSERT INTO users (username, password, firstname, lastname, email, phone) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL Error";
    } else {
        mysqli_stmt_bind_param($stmt, "ssssss", $username, $password, $first, $last, $email, $phone);
        mysqli_stmt_execute($stmt);
    }

    header("Location: P6.php?signup=success");
?>