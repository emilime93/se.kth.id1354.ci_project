<?php
    session_start();
    unset($_SESSION['logged-in-user']);
    session_destroy();
    $url = $_SESSION['current-page'];
    header("Location: $url");
    exit();
?>
