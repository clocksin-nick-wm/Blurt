<?php
$page_title = 'Admin Login';
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');




// Clear the error message
$error_msg = "";

// If the user isn't logged in, try to log them in


    if (isset($_POST['submit'])) {

        // Connect to the database
        $dbh = new PDO('mysql:host=localhost; dbname=blurtdb', 'root', 'root');

        // Grab the user-entered log-in data
        $username = trim($_POST['username']);
        $password =trim($_POST['password']);

        if (!empty($username) && !empty($password)) {

            // Look up the username and password in the database
            $query = "SELECT username, password FROM admin WHERE username = :username AND password = :password";

            $stmt = $dbh->prepare($query);
            $stmt->execute(
                array(

                    ':username' => $username,
                    ':password' => $password

                ));

            $results = $stmt->fetchAll();
            print_r($results);

            if (count($results) == 1) {

                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page

                $row = $results[0];

                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days

                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/adminusers.php';

                header('Location: ' . $home_url);

            } else {

                // The username/password are incorrect so set an error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }

        } else {

            // The username/password weren't entered so set an error message
            $error_msg = 'Sorry, you must enter your username and password to log in.';
        }


}

?>

<!DOCTYPE html>
    <html>
<head>
    <title>Blurt <?php echo $page_title ?></title>
</head>
<body>
<form>
    <fieldset>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input name="password" type="password" id="username">
        <button type="submit" name="submit" id="submit">Submit</button>
    </fieldset>
</form>
<?php
?>
</body>
</html>
