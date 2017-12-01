<head>
    <link rel="stylesheet" href="<?php echo asset_url();?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo asset_url();?>css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPacifico" rel="stylesheet">

    <link rel="icon" href="<?php echo asset_url()?>favicon.ico" type="image/gif">

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
                    <a href="<?php echo base_url();?>users/register">
                        <button id="login-button">Register</button>
                    </a>
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
            <!-- FLASH MESSAGES -->
            <?php if ($this->session->flashdata('user_registered')): ?>
                <?php echo '<p class="success">'.$this->session->flashdata('user_registered').'</p>';?>
            <?php endif;?>
