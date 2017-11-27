<?php
    require './keys.php';

    $recipe = $_SESSION['recipe'];
    $user = $_SESSION['logged-in-user'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check that connection is valid and works.
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    // Build query and get the reults.
    $sql = "SELECT * FROM `comment` WHERE `recipe`='$recipe'";
    $result = $conn->query($sql);

    $numcomments = 0;
    while($row = $result->fetch_assoc()) {
        $numcomments++;
        $usr = $row['user'];
        $cmt = $row['comment'];
        echo '<div class="comment clearfix">';
        echo '<img src="img/generic-avatar.png" alt="A users avatar" class="profile-pic">';
        echo "<span class=\"user-name\">$usr</span>";
        echo "<br>";
        echo "<p>$cmt</p>";
        // If it's the logged in user's comment.
        if ($usr == $user) {
            $id = $row['id'];
            echo '<form action="delete-comment.php" method="post">';
            echo "<input type=\"hidden\" name=\"comment-id\" value=\"$id\">";
            echo '<input class="delete-comment" type="submit" value="Delete">';
            echo "</form>";
        }
        echo "</div>";
    }

    if ($numcomments == 0) {
        echo "<p>Unfortunately there are no comments yet!</p>";
    }

    //closes the connection
    $conn->close();

/*<div class="comment clearfix">
    <img src="img/generic-avatar.png" alt="A users avatar" class="profile-pic">
    <span class="user-name">Loris</span>
    <br>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>*/

?>
