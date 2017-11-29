<?php
    session_start();
    require 'keys.php';

    $id = $_POST['comment-id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check that connection is valid and works.
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM `comment` WHERE `id`='$id'";
    $conn->query($sql);
    $conn->close();
    $url = $_SESSION['current-page'];
    header("Location: $url");
    exit();
?>
