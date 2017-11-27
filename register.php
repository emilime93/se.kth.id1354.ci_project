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
                  <div class="login-area">
                      <?php
                      if (isset($_SESSION['invalid-user'])) {
                          unset($_SESSION['invalid-user']);
                          echo '<p class="required">Username is not available. Choose another.</p>';
                      }
                      if (isset($_SESSION['missing-field'])) {
                          unset($_SESSION['missing-field']);
                          echo '<p class="required">Please fill every field with a *</p>';
                      }
                      ?>
                      <h2>Register</h2>
                      <form class="login-form" action="register-handler.php" method="post">
                          <label for="username-field">Username
                              <span class="required">*</span>
                          </label>
                          <input type="text" id="username-field" name="username">
                          <label for="password-field">Password
                              <span class="required">*</span>
                          </label>
                          <input type="password" id="password-field" name="password">
                          <input id="submit-login" type="submit" value="Register">

                      </form>
                      <p>The fields marked with <span class="required">*</span> are required.</p>
                  </div>
              </main>

              <div class="pusher"></div>
        </div>

        <?php
            include 'fragments/footer.php';
        ?>
    </body>
</html>
