<?php
if(!isset($_SESSION['id'])){
    echo '<p>You must be <a href="adminlogin.php"> logged in</a> to have access to the Admin page</p>';
    exit();
}
?>