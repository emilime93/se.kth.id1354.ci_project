<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <?php
        include 'fragments/head.php';
    ?>

    <body>

        <div id="wrapper">

            <?php
                include 'fragments/header.php';
            ?>

            <?php
                include 'fragments/nav.php';
            ?>

            <main>

                <article class="main-article">

                    <h2>Pancakes</h2>

                    <img src="img/pancakes.jpg" alt="A serving suggestion for the pancakes recipe" class="recipe-img">

                    <div class="ingredients">
                        <h3>Ingredients</h3>
                        <ul>
                            <li>4dl Milk</li>
                            <li>4dl Flour</li>
                            <li>2 Eggs</li>
                            <li>2dl Sugar</li>
                            <li>A pinch of Vanilla extract</li>
                            <li>Any jam that you like</li>
                            <li>Whipped Cream</li>
                        </ul>
                    </div>
                    <div class="instructions">
                        <h3>Instructions</h3>
                        <p>
                            Mix the flour, milk, egg and sugar to a batter. Then pour about 1dl of the batter into the frying pan with a bit of butter. Fry until golden-brown.
                        </p>
                        <p>
                            Serve with jam and whipped cream.
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
