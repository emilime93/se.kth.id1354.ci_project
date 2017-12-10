<article class="home-article">
    <h2>Calendar!</h2>
    <p>
        <em>New feature!</em> We added a calendar where you can see
        the the food of the week or something! I'll have to write
        something better here.
        <a href="<?php base_url();?>/calendar">Check it out here</a> or click <em>calendar</em> in the menu!
    </p>
    <img src="<?php echo asset_url();?>img/calendar.png" alt="A icon of a calendar to provide easy context">

</article>

<article class="home-article">
    <h2>The home of recipes!</h2>
    <p>
        <em>Welcome!</em> This site is your best source for jummy
        recipes! Under "Recipes" you will find everything you could ever need!
    </p>

    <script>
        window.onload = function() {
            if (window.jQuery) {
                // jQuery is loaded
                alert("Yeah!");
            } else {
                // jQuery is not loaded
                alert("Doesn't Work");
            }
        }
    </script>

</article>