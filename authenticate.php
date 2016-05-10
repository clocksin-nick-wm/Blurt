<?php
if(!isset($_SESSION['user_id'])){
echo '<p>You must be <a href="profilelogin.php"> logged in</a> to view this page or <a href="profilelogin.php"> create an account</a></p>';
exit();
}
?>