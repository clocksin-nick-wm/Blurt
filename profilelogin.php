<?php
$page_title = 'Login Page/Sign Up';
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
require_once('start_session.php');



// Clear the error message
$error_msg = "";

// If the user isn't logged in, try to log them in
if (!isset($_SESSION['user_id'])) {

    if (isset($_POST['login'])) {

        // Connect to the database
        $dbh = new PDO('mysql:host=127.0.0.1; dbname=blurtdb', 'root', 'root');

        // Grab the user-entered log-in data
        $username = trim($_POST['username']);
        $password =trim($_POST['password']);

        if (!empty($username) && !empty($password)) {

            // Look up the username and password in the database
            $query = "SELECT id, username FROM users WHERE username = :username AND password = SHA(:password)";

            $stmt = $dbh->prepare($query);
            $stmt->execute(
                array(

                    'username' => $username,
                    'password' => $password

                ));

            $results = $stmt->fetchAll();

            if (count($results) == 1) {

                // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page

                $row = $results[0];

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                setcookie('user_id', $row['id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days

                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';

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

}


// If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in

if (empty($_SESSION['user_id'])) {

?>
<!DOCTYPE html>
<html>
<head>
    <title>Blurt <?php echo $page_title ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-image: url("https://www.nordicvisitor.com/images/greenland/ilulissatnorthgreenland-northernlights-greenland-ilovegreenland-%C2%A9andreschoenherr.jpg");
        background-size: cover; /* <------ */
        background-repeat: no-repeat;
    }
</style>
<body>
<nav class="navbar navbar-default">
    <img src="Blurt.png" width="85px" height="50px">
    <form class="navbar-form navbar-right" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <input name="username" id="username" type="text" class="form-control" placeholder="Username">
            <input name="password" id="password" type="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default" id="login" name="login">Submit</button>
    </form>
</nav>
<?php

if (isset($_POST['signup'])) {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
        $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (:first_name, :last_name, :email, :username, SHA(:password1))";
        $stmt = $dbh->prepare($query);
        $results = $stmt->execute(array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'username' => $username,
            'password1' => $password1
        ));
        if ($results) {
            echo '<p>Thank You for joining Blurt click here to <a href="profilelogin.php">login</a></p>';

        } else {
            echo '<p>There was an error in the form that you entered</p>';
        }

    }
}

?>
<div id="form"
     style="height: 700px; width: 400px; float: right; top: 150px; right:50px; z-index: 1; position:absolute;">
    <form id="msform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
          style="height: 700px; width: 400px; float: left;">
        <fieldset style="height: 700px; width: 400px; margin-top: -12.5%; margin-left: -.1%;">
            <h3 class="fs-subtitle" style="font-size: 50px; color: teal">Sign Up</h3>
            <br>
            <input type="text" name="first_name" placeholder="First Name"/>
            <br><br>
            <input type="text" name="last_name" placeholder="Last Name"/>
            <br><br>
            <input type="tel" name="email" placeholder="Email"/>
            <br><br>
            <input type="text" name="username" placeholder="Username"/>
            <br><br>
            <input type="password" name="password1" placeholder="Password"/>
            <br><br>
            <input type="password" name="password2" placeholder="Retype password"/>
            <br><br>
            <input type="submit" name="signup" value="Submit"/>
        </fieldset>

    </form>
</div>
<footer>

</footer>
<?php
}
else {
    echo '<p>You are already logged in please return to the <a href="index.php">homepage</a> </p>';

}
?>
</body>
</html>