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
                    <?php if(!$this->session->userdata('logged_in')): ?>
                        <a href="<?php echo base_url();?>users/register">
                            <button id="login-button">Register</button>
                        </a>
                        <a href="<?php echo base_url();?>users/login">
                            <button id="login-button">Log in</button>
                        </a>
                    <?php endif?>
                    <?php if($this->session->userdata('logged_in')): ?>
                        <p>Welcome back, <?php echo $this->session->userdata('username'); ?></p>
                    <a href="<?php echo base_url();?>users/logout">
                        <button id="login-button">Log Out</button>
                    </a>
                    <?php endif?>
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
                <?php echo '<div class="success center">'.$this->session->flashdata('user_registered').'</div>';?>
            <?php endif;?>

            <?php if ($this->session->flashdata('login_failed')): ?>
                <?php echo '<div class="error center">'.$this->session->flashdata('login_failed').'</div>';?>
            <?php endif;?>

            <?php if ($this->session->flashdata('user_logged_in')): ?>
                <?php echo '<div class="success center">'.$this->session->flashdata('user_logged_in').'</div>';?>
            <?php endif;?>

            <?php if ($this->session->flashdata('user_logged_out')): ?>
                <?php echo '<div class="success center">'.$this->session->flashdata('user_logged_out').'</div>';?>
            <?php endif;?>

            <?php if ($this->session->flashdata('comment_deleted')): ?>
                <?php echo '<div class="success center">'.$this->session->flashdata('comment_deleted').'</div>';?>
            <?php endif;?>

            <?php if ($this->session->flashdata('comment_delete_fail')): ?>
                <?php echo '<div class="error center">'.$this->session->flashdata('comment_delete_fail').'</div>';?>
            <?php endif;?>
