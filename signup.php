<?php
    $dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
if(isset($_POST['submit'])){
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']) && ($password1 == $password2)){
        $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (0, ':first_name', ':last_name', ':email', ':username', SHA('$password1'))";
        $stmt = $dbh -> prepare($query);
        $stmt -> execute(array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'username' => $username,
            'password' => $password1
        ));
        echo '<p>Thanks for joining the community ' . $_POST['first_name'] . ' enjoy this site. Click here to <a href="login.php">login</a></p>';
        exit ();
        print_r($_POST);
        print_r($query);
    }
    else {
        echo'There was an error with the inputted information please try again';
    }
}

?>
<!DOCTYPE html>
    <html>
<head>
    <title>Blurt</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
        <label for="first_name">First Name:</label>
        <input id="first_name" name="first_name">
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text" ><br />
        <label for="email'">Email:</label>
        <input type="email" name="email" id="email">
        <label for="username">Username:</label>
        <input name="username" id="username"><br />
        <label for="password1">Password:</label>
        <input name="password1" id="password1" type="password">
        <label for="password2">Retype Password:</label>
        <input id="password2" name="password2" type="password">
        </fieldset>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
