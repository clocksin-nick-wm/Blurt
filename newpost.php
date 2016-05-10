<?php
require_once('start_session.php');
require_once('authenticate.php');
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
$error = "";
    $page_title =  'Create Post';
if(isset($_POST['submit'])){

    $post = trim($_POST['post']);
    if(!empty($_POST['post'])) {

        $query = "INSERT INTO posts (post, user_id, username) VALUES (:post,'" . $_SESSION['user_id'] . "', '" . $_SESSION['username'] . "')";
        $stmt = $dbh->prepare($query);
        $results = $stmt->execute(array(
            'post' => $post
        ));
        if($results){
            echo '<p>Your post was successful <a href="index.php">click here</a>  to see your post.</p>';
            exit();
        }
    }
    else{
        echo '<p>The field post you entered was empty please retype your post.</p>';
    }
}
else {
    print_r($error);
}

?>
<!DOCTYPE html>
    <html>
<head>
    <title>Blurt <?php echo $page_title ?></title>
</head>
<body>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <label for="post">Post:</label>
        <textarea type="text" name="post">

        </textarea>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
