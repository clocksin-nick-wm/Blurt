<?php
$page_title = 'Must Login';
if(!isset($_SESSION['id'])){
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
exit();
?>