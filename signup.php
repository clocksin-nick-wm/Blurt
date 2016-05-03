<?php
    $pagetitle = 'Sign Up';
    $dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
if(isset($_POST['submit'])) {
    // Variables used throughout to call from the post
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password1 = trim($_POST['password1']);
    $password2 = trim($_POST['password2']);
    // If statement check to see if the post are or aren't empty
    if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2']) && ($password1 == $password2)) {
        $query = "SELECT FROM users WHERE username = ':username', email = ':email'";
        $stmt = $dbh -> prepare($query);
        $stmt -> execute();
        $data = $stmt -> fetchAll();
        if (count($data) == 0) {
            // Inserts data from posts into the database users
            $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (:first_name, :last_name, :email, :username, SHA(:password1))";
             $stmt = $dbh->prepare($query);
            $result = $stmt->execute(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'username' => $username,
                'password1' => $password1
            ));

            if($result) {
                // If successful user will see this echo
                echo '<p>Thanks for joining the community ' . $_POST['first_name'] . ' enjoy this site. Click here to <a href="login.php">login</a></p>';
                exit ();
            }else{
                print_r($stmt->errorInfo());
            }
        }
        if ($password1 != $password2) {
            //If passwords do not match error message will show and erase user data
            echo '<p class="error">Your passwords do not match. Please Retype them</p>';
            $password1 = "";
            $password2 = "";
        }
        else{
            //If username is similar to that of one in the database error message will appear
            echo '<p class="error">Your username matches one already found in the databse</p>';
            $username = "";
        }
    }
    else {
        echo'<p class="error">There was an error with the inputted information please try again</p>';
    }
}


?>
<!DOCTYPE html>
    <html>
<head>
    <title>Blurt <?php echo $pagetitle ?></title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
        <label for="first_name">First Name:</label>
        <input id="first_name" name="first_name" type="text">
        <label for="last_name">Last Name:</label>
        <input id="last_name" name="last_name" type="text" ><br />
        <label for="email'">Email:</label>
        <input type="email" name="email" id="email">
        <label for="username">Username:</label>
        <input name="username" id="username" type="text"><br />
        <label for="password1">Password:</label>
        <input name="password1" id="password1" type="password">
        <label for="password2">Retype Password:</label>
        <input id="password2" name="password2" type="password">
        </fieldset>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
