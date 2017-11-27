<?php

    session_start();
    require 'keys.php';

    /*if (isset($_SESSION['logged-in-user']) && $_POST['username'] == $_SESSION['logged-in-user']) {
        header("Location: calendar.php");
        exit();
    }*/

    if ($_POST['username'] == "" || $_POST['password']=="") {
        $_SESSION['missing-field'] = 1;
        header("Location: login.php");
        exit();
    }

    $login_username = $_POST['username'];
    $login_password = $_POST['password'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check that connection is valid and works.
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `user` WHERE `username`='$login_username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
       // output data of each row
       $row = $result->fetch_assoc();
       if (password_verify($login_password, $row['password'])) {
           $_SESSION['logged-in-user'] = $row['username'];
           $url = $_SESSION['current-page'];
           $conn->close();
           header("Location: $url");
       } else {
           $_SESSION['incorrect-login'] = 1;
           $conn->close();
           header("Location: login.php");
       }
        exit();
   } elseif($result->num_rows > 1) {
       echo 'Too many results. Error <br>';
   } else {
       $_SESSION['incorrect-login'] = 1;
       $conn->close();
       header("Location: login.php");
       exit();
    }
    $conn->close();
 ?>
