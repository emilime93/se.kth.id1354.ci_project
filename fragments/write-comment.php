<div class="write-comment">
    <h3>Leave a comment</h3>
    <textarea id="comment-text-area" name="comment" rows="4" cols="50" form="comment-form"></textarea>
    <form id="comment-form" class="" action="comment-register.php" method="post">
        <input type="hidden" name="recipe" value="<?php
        echo basename($_SERVER['PHP_SELF'], "-recipe.php"); ?>">
        <input id="comment-submit" type="submit" value="Comment">
    </form>
</div>
