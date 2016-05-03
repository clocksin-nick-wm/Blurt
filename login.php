<?php
$pagetitle = 'Login';
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
if(!isset($_SESSION['user_id'])) {
    if (isset($_POST['submut'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(!empty($username) && !empty($password)) {
            $query = "SELECT userid, username FROM users WHERE username = $username AND  password = SHA(:password)";
            $stmt = $dbh -> prepare($query);
            $stmt -> execute(array(
               'username' => $username,
                'password' => $password
            ));
            $result = $stmt -> fetchAll();
            if(count($result) == 1 ){
                $row = $result[0];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                header('Location: ' . $home_url);
            }
            else {
                // The username/password are incorrect so set an error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }
        else {
            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
        }
        }
}
?>
<!DOCTYPE html>
    <html>
<head>
    <title>Blurt <?php echo  $pagetitle ?> </title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
