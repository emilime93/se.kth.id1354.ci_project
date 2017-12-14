<article class="main-article">

    <h2>Pancakes</h2>

    <img src="<?php echo asset_url();?>img/pancakes.jpg" alt="A serving suggestion for the pancakes recipe" class="recipe-img">

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

        <?php if($this->session->userdata('logged_in')) :?>
        <span class="required"><?php echo validation_errors(); ?></span>

        <?php $create_attributes = array("id" => "create-comment-form"); ?>
        <?php echo form_open('comments/create/'.strtolower($title), $create_attributes);?>
            <textarea id="comment-text-area" name="comment" rows="4" cols="50"></textarea>
            <br>
            <input id="submit-comment" type="submit" value="Send">
        <?php echo form_close();?>

    <?php endif;?>

    <!-- This form is to be able to get data. It's an ugly solution and most probably not the
    way to go. Bud had to be done in order to make it work in time... SHAME! -->
    <?php $create_attributes = array("id" => "display-comments-data"); ?>
    <?php echo form_open('comments/getcomments/'.strtolower($title), $create_attributes);?>
        <input type="hidden" name="logged-in-user" value="<?php echo $this->session->userdata('username');?>">
        <input type="hidden" name="recipe" value="<?php echo strtolower($title)?>">
        <input type="hidden" name="base-url" value="<?php echo base_url()?>">
    <?php echo form_close(); ?>

    <script src="<?php echo asset_url(); ?>scripts/comments.js" async></script>
    </div>

</article>