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
                      if (isset($_SESSION['missing-field'])) {
                          unset($_SESSION['missing-field']);
                          echo '<p class="required">Please fill every field with a *</p>';
                      }
                      if ($_SESSION['incorrect-login']) {
                          unset($_SESSION['incorrect-login']);
                          echo '<p class="required">Incorrect username and/or password. Try again!<p>';
                      }
                      if (isset($_SESSION['registration-complete'])) {
                          unset($_SESSION['registration-complete']);
                          echo '<p class="registration-complete">Registration complete!</p>';
                      }
                      ?>
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
                      <p>Not a user already? Create a account <a href="register.php">here</a>.</p>
                  </div>
              </main>


            <div class="pusher"></div>
        </div>

        <?php
            include 'fragments/footer.php';
        ?>
    </body>
</html>
