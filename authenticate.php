<?php
if(!isset($_SESSION['user_id'])){
echo '<p>You must be <a href="login.php"> logged in</a> to view this page or <a href="signup.php"> create an account</a></p>';
exit();
}
?>