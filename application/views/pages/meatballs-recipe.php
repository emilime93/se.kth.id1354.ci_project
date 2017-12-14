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


        <script src="<?php echo asset_url(); ?>scripts/submit_comment.js" async></script>

        <div class="comment clearfix"></div>
        
        <p type="hidden"> aassasadas</p>
        <script src="<?php echo asset_url(); ?>scripts/display_comments.js" async></script>

        <?php /* COMMENTED THIS AWAY TO BE ABLE TO WORK PEACEFULLY
            <?php
                if (empty($comments)) {
                    echo "<p>Unfortunately there are no comments yet!</p>";
                } else {
                    foreach ($comments as $comment): ?>
                        <div class="comment clearfix">
                            <img src="<?php echo asset_url().'img/generic-avatar.png';?>" alt="A users avatar" class="profile-pic">
                            <span class="user-name"><?php echo $comment->user;?></span>
                            <br>
                            <p><?php echo $comment->comment;?></p>
                            <?php if ($comment->user == $this->session->userdata('username')): ?>
                            <?php $delete_attributes = array("id" => "delete-form") ?>
                                <?php echo form_open('comments/delete_comment', $delete_attributes); ?>
                                    <input type="hidden" name="id" value="<?php echo $comment->id;?>">
                                    <input type="hidden" name="recipe" value="<?php echo strtolower($title);?>">
                                    <input id="delete-button" type="submit" class="delete-comment" value="Delete">
                                <?php echo form_close();?>
                            <?php endif; ?>
                        </div>
                    <?php endforeach;
                }
            ?>
        */?>
    </div>

</article>