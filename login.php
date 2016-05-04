<?php
$pagetitle = 'Login';
session_start();

if(!isset($_SESSION['id'])) {
    if (isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(!empty($username) && !empty($password)) {
            $dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
            $query = "SELECT id, username FROM users WHERE username = :user_username AND  password = SHA(:user_password)";
            $stmt = $dbh -> prepare($query);
            $stmt -> execute(array(
               'user_username' => $username,
                'user_password' => $password
            ));
            $result = $stmt -> fetchAll();
            if(count($result) == 1 ){
                $row = $result[0];
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url);
            }
            else {
                // The username/password are incorrect so set an error message
               echo 'Sorry, you must enter a valid username and password to log in.';
            }
        }
        else {
            // The username/password weren't entered so set an error message
            echo 'Sorry, you must enter your username and password to log in.';
        }
        }
}
if(empty($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blurt <?php echo $pagetitle ?> </title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php if(!empty($username)) echo $username; ?>">
        <label for="password">Password:</label>
        <input id="password" name="password" type="password">
        <button type="submit" name="submit" id="submit">Submit</button>
    </fieldset>
</form>
<?php
}
else{
    echo '<p>You are already logged in please as ' . $_SESSION['username'] . ' return to the <a href="index.php">homepage.</a></p>';
}
?>
<footer><p>&copy Blurt 2016</p></footer>
</body>
</html>
