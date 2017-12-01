<h2><? echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>

    <label for="username-field">Username
        <span class="required">*</span>
    </label>
    <input type="text" id="username-field" name="username" placeholder="Username">

    <label for="password-field">Password
        <span class="required">*</span>
    </label>
    <input id="password-field" type="password" name="password" placeholder="Password">

    <label for="password-field2">Repeat Password
        <span class="required">*</span>
    </label>
    <input id="password-field2" type="password" name="passwordRepeat" placeholder="Password">

    <input id="submit-login" type="submit" value="Register">

<?php echo form_close(); ?>

<p>The fields marked with <span class="required">*</span> are required.</p>