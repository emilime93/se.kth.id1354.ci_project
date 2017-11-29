<head>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPacifico" rel="stylesheet">

    <link rel="icon" href="<?=base_url()?>/favicon.ico" type="image/gif">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <title>Tasty Recipes | <?php echo $title; ?></title>

</head>

<body>

    <div id="wrapper">

        <header>
            <div class="header-content">
                <a href="<?php echo base_url(); ?>">
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

        <div class="desktop-navigation">
            <nav>
                <ul>
                    <li id="<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'index') echo'active'; ?>"><a href="<?php echo base_url(); ?>">Home</a>
                    <li id="<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'meatballs-recipe' ||
                        basename($_SERVER['PHP_SELF'], ".php") == 'pancakes-recipe') echo'active'; ?>"><a href="#">Recipes</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>meatballs-recipe">Meatballs</a>
                            <li><a href="<?php echo base_url(); ?>pancakes-recipe">Pancakes</a>
                        </ul>
                    <li id="<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'calendar') echo'active'; ?>"><a href="<?php echo base_url(); ?>calendar">Calendar</a>
                </ul>
            </nav>
        </div>
        <main>