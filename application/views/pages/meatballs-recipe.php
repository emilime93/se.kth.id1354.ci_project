<article class="main-article">

    <h2>Meatballs</h2>
    <img src="<?php echo asset_url();?>img/meatballs.jpg" alt="A serving suggestion for the meatballs recipe"
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
            Then fry it in the frying pan.
            Then add the crushed tomatoes and mix everything.
        </p>
    </div>

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