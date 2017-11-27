<div class="desktop-navigation">
    <nav>
        <ul>
            <li id="<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'index') echo'active'; ?>"><a href="index.php">Home</a>
                <li id="<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'meatballs-recipe' ||
                    basename($_SERVER['PHP_SELF'], ".php") == 'pancakes-recipe') echo'active'; ?>"><a href="#">Recipes</a>
                <ul>
                    <li><a href="meatballs-recipe.php">Meatballs</a>
                    <li><a href="pancakes-recipe.php">Pancakes</a>
                </ul>
            <li id="<?php if (basename($_SERVER['PHP_SELF'], ".php") == 'calendar') echo'active'; ?>"><a href="calendar.php">Calendar</a>
        </ul>
    </nav>
</div>
