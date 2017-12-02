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

            <?php echo form_open('comments/create/'.strtolower($title));?>
            <textarea id="comment-text-area" name="comment" rows="4" cols="50"></textarea>
            <br>
            <input id="submit-comment" type="submit" value="Send">
            <?php echo form_close();?>

        <?php endif;?>

        <?php
        // PROBABLY REMOVE THIS
        if (empty($comments)) {
            echo "<p>Unfortunately there are no comments yet!</p>";
        } else {
            foreach ($comments as $comment): ?>
                <div class="comment clearfix">
                    <img src="<?php echo asset_url().'img/generic-avatar.png';?>" alt="A users avatar" class="profile-pic">
                    <span class="user-name"><?php echo $comment->user;?></span>
                    <br>
                    <p><?php echo $comment->comment;?></p>
                    <?php
                    if ($comment->user == $this->session->userdata('username')): ?>
                        <?php echo form_open('comments/delete_comment'); ?>
                        <input type="hidden" name="id" value="<?php echo $comment->id;?>">
                        <input type="hidden" name="recipe" value="<?php echo strtolower($title);?>">
                        <input type="submit" class="delete-comment" value="Delete">
                        <?php echo form_close();?>
                    <?php endif; ?>
                </div>
            <?php endforeach;
        }
        ?>
    </div>

</article>