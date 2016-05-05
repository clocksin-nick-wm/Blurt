<?php
<<<<<<< HEAD
if(!isset($_SESSION['user_id'])){
echo '<p>You must be <a href="login.php"> logged in</a> to view this page or <a href="signup.php"> create an account</a></p>';
=======
$page_title = 'Must Login';
<<<<<<< HEAD
if(!isset($_SESSION['id'])){
=======
if(empty($_SESSION['user_id'])){
>>>>>>> 12a4914ed9115f7c8738522652ea539e8ee9befe
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Blurt <?php echo $page_title?></title>
    </head>
    <body>
    <p style="text-align: center">You must be <a href="login.php"> logged in </a> to view this page</p><br />
    <p style="text-align: center">You can also <a href="signup.php"> sign up </a> here if you don't have an account</p>
    </body>
    </html>
<?php
}
>>>>>>> 7272fe450d8ba6a1e51c5054636e899239c4c5c5
exit();
}
?>