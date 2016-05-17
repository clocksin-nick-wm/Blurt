<!DOCTYPE html>
<html>
<head>
    <title>Blurt Remove User</title>
</head>
<body>
<h2>Blurt - Remove a Post</h2>
​
<?php

if (isset($_GET['id']) && isset($_GET['username']) && isset($_GET['post']) && isset($_GET['user_id']) && isset($_GET['post_time'])){
    $id = $_GET['id'];
    $post = $_GET['post'];
    $user_id = $_GET['user_id'];
    $username = $_GET['username'];
    $post_time = $_GET['post_time'];
}
else {
    echo '<p class="error">Sorry, no post was specified for removal.</p>';
}

if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
        // Connect to the database
        $dbh = new PDO('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');

        // Delete the score data from the database
        $query = "DELETE FROM posts WHERE id = :id LIMIT 1";

        $stmt = $dbh->prepare($query);
        $stmt->execute(array('id'=>$_POST['id']));
        $score = $stmt->fetchAll();

        // Confirm success with the user
        echo '<p>'. $post .' was successfully deleted from Blurt</p>';
    }
    else {
        echo '<p class="error">The post was not removed</p>';
    }
}
else if (isset($id) && isset($post) && isset($user_id) && isset($username) && isset($post_time)){
    echo '<p>Are you sure you want to delete the following high score?</p>';
    echo '<p><strong>Post: </strong>' . $post . '<br /><strong>Username: </strong>' . $username .'</p>';
    echo '<form method="post" action="removepost.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="name" value="' . $post . '" />';
    echo '<input type="hidden" name="score" value="' . $username . '" />';
    echo '</form>';
}

echo '<p><a href="admin%20posts.php">&lt;&lt; Back to admin page</a></p>';
?>
​
</body>
</html>