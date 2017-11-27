<?php session_start();
if (!(basename($_SERVER['PHP_SELF'], ".php") == 'login') &&
!(basename($_SERVER['PHP_SELF'], ".php") == 'register')) {
    $_SESSION['current-page'] = basename($_SERVER['PHP_SELF']);
}
?>

<header>
    <div class="header-content">
        <a href="index.php">
            <h1>TASTY</h1>
        </a>
        <div class="user-area">
            <?php
                if (isset($_SESSION['logged-in-user'])) {
                    include 'logged-in-header.php';
                } else {
                    include 'logged-out-header.php';
                }
            ?>
        </div>
    </div>
</header>
