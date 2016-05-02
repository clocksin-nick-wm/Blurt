<?php
$pagetitle = 'Login';
$username = $_POST['username'];
$email = $_POST['email'];
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
if($_GET['submut']){
    $query = "SELECT FROM users WHERE username = $username or email = $email";
}
?>
<!DOCTYPE html>
    <html>
<head>
    <title>Blurt <?php echo  $pagetitle ?> </title>
</head>
<body>
<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password">
        <button type="submit" name="submit" id="submit">Submit</button>
    </fieldset>
</form>
</body>
</html>
