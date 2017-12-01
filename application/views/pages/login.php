<div class="login-area">
    <h2>Log In</h2>
    <form class="login-form" action="login-handler.php" method="post">
        <label for="username-field">Username
            <span class="required">*</span>
        </label>
        <input type="text" id="username-field" name="username">
        <label for="password-field">Password
            <span class="required">*</span>
        </label>
        <input type="password" id="password-field" name="password">
        <input id="submit-login" type="submit" value="Log In">

    </form>
    <p>The fields marked with <span class="required">*</span> are required.</p>
    <p>Not a user already? Create a account <a href="<?php echo base_url(); ?>register">here</a>.</p>
</div>