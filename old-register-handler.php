<?php

    session_start();
    require 'keys.php';

    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    if ($_POST['username'] == "" || $_POST['password'] == "") {
        $_SESSION['missing-field'] = 1;
        header("Location: register.php");
        exit();
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check that connection is valid and works.
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    // Creates parts of the query
    $table = "`user`";
    $where_condition = "WHERE `username`='$login_username'";

    // Build query and get the reults.
    $sql = "SELECT `username` FROM $table $where_condition";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
       $_SESSION['invalid-user'] = 1;
       $conn->close();
       header("Location: register.php");
       exit();
   } else {
       //The user exists
       $uname = $_POST['username'];
       $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);
       $sql = "INSERT INTO $table (`username`, `password`) VALUES ('$uname', '$pw')";
       $conn->query($sql);
       $conn->close();
       $_SESSION['registration-complete'] = 1;
       header("Location: login.php");
       exit();
   }
    $conn->close();
 ?>
