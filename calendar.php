<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <?php
        include 'fragments/head.php';
    ?>
    <body>
        <div id="wrapper">

            <?php
                include 'fragments/header.php';
                include 'fragments/nav.php';
            ?>

            <main>

                <article class="main-article">
                    <h2>Calendar</h2>

                    <div class="calendar">
                        <div class="label"><span>Mon</span></div>
                        <div class="label"><span>Tue</span></div>
                        <div class="label"><span>Wed</span></div>
                        <div class="label"><span>Thu</span></div>
                        <div class="label"><span>Fri</span></div>
                        <div class="label"><span>Sat</span></div>
                        <div class="label"><span>Sun</span></div>

                        <div class="day"><span class="number">1</span></div>
                        <div class="day"><span class="number">2</span></div>
                        <div class="day"><span class="number">3</span></div>
                        <div class="day"><span class="number">4</span></div>
                        <div class="day"><span class="number">5</span></div>
                        <a href="meatballs-recipe.php">
                            <div class="day fotd-meatballs"><span class="number">6</span></div>
                        </a>
                        <div class="day"><span class="number">7</span></div>
                        <div class="day"><span class="number">8</span></div>
                        <div class="day"><span class="number">9</span></div>
                        <div class="day"><span class="number">10</span></div>
                        <div class="day"><span class="number">11</span></div>
                        <div class="day"><span class="number">12</span></div>
                        <div class="day"><span class="number">13</span></div>
                        <a href="pancakes-recipe.php">
                            <div class="day fotd-pancakes"><span class="number">14</span></div>
                        </a>
                        <div class="day"><span class="number">15</span></div>
                        <div class="day"><span class="number">16</span></div>
                        <div class="day"><span class="number">17</span></div>
                        <div class="day"><span class="number">18</span></div>
                        <div class="day"><span class="number">19</span></div>
                        <div class="day"><span class="number">20</span></div>
                        <div class="day"><span class="number">21</span></div>
                        <div class="day"><span class="number">22</span></div>
                        <div class="day"><span class="number">23</span></div>
                        <div class="day"><span class="number">24</span></div>
                        <div class="day"><span class="number">25</span></div>
                        <div class="day"><span class="number">26</span></div>
                        <div class="day"><span class="number">27</span></div>
                        <div class="day"><span class="number">28</span></div>
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
