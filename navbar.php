<?php
if(isset($_SESSION['username'])) {
    echo '<a href="index.php">Posts</a>&infin;';
    echo '<a href="view.php">My Posts</a>&infin;';
    echo '<a href="editprofile.php">Edit Profile</a>';
    echo  '<a href="logout.php">Logout ('. $_SESSION['username'] .')</a>';
}
?>