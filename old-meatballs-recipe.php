<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php
        include 'fragments/head.php';
    ?>

    <body>
        <div id="wrapper">

            <?php
                include 'fragments/header.php'
            ?>

            <?php
                include 'fragments/nav.php';
            ?>

            <main>
                <article class="main-article">

                    <h2>Meatballs</h2>
                    <img src="img/meatballs.jpg" alt="A serving suggestion for the meatballs recipe"
                    class="recipe-img">

                    <div class="ingredients">
                        <h3>Ingredients</h3>
                        <ul>
                            <li>800g Ground Beef</li>
                            <li>800g Crushed tomates</li>
                            <li>2 Garlic Cloves</li>
                            <li>2 Onions</li>
                            <li>Bread Crumbs</li>
                            <li>Butter</li>
                            <li>Thyme</li>
                            <li>Chili Flakes</li>
                            <li>Oregano</li>
                            <li>Salt &amp; Pepper</li>
                        </ul>
                    </div>
                    <div class="instructions">
                        <h3>Instructions</h3>
                        <p>
                            First mix the ground beef with the rest of the things.
                            Then fry it in the fyring pan.
                            Then add the crushed tomatoes and mix everything.
                        </p>
                    </div>

                    <?php if (isset($_SESSION['logged-in-user'])) {
                        include 'fragments/write-comment.php';
                    } ?>

                    <div class="comments">
                        <h3 id="comments">Comments</h3>
                        <?php
                            $_SESSION['recipe'] = basename($_SERVER['PHP_SELF'], "-recipe.php");
                            include 'fragments/comment-printer.php';
                         ?>
                    </div>

                </article>
            </main>

            <div class="pusher"></div>
        </div>

        <?php
            include 'fragments/footer.php';
        ?>
    </body>
</html>
