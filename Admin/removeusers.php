<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Blurt Remove User</title>
</head>
<body>
<h2>Blurt - Remove a User</h2>
​
<?php

if (isset($_GET['id']) && isset($_GET['username']) && isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['password']) && isset($_GET['email']) && isset($_GET['description'])){
    $id = $_POST['id'];
    $name = $_POST['first_name'];
    $score = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $description = $_POST['description'];
}
else {
    echo '<p class="error">Sorry, no high score was specified for removal.</p>';
}

if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
        // Connect to the database
        $dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');

        // Delete the score data from the database
        $query = "DELETE FROM users WHERE id = $id LIMIT 1";

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $score = $stmt->fetchAll();

        // Confirm success with the user
        echo '<p>'.$username .' was successfully deleted from Blurt</p>';
    }
    else {
        echo '<p class="error">The high score was not removed.</p>';
    }
}
else if (isset($id) && isset($name) && isset($date) && isset($score)) {
    echo '<p>Are you sure you want to delete the following high score?</p>';
    echo '<p><strong>Name: </strong>' . $name . '<br /><strong>Username: </strong>' . $username .
        '<br /><strong>Email: </strong>' . $email . '</p>';
    echo '<form method="post" action="removeusers.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="name" value="' . $name . '" />';
    echo '<input type="hidden" name="score" value="' . $score . '" />';
    echo '</form>';
}

echo '<p><a href="adminusers.php">&lt;&lt; Back to admin page</a></p>';
?>
​
</body>
</html>