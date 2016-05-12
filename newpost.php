<?php
require_once('start_session.php');
require_once('authenticate.php');
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
$error = "";
    $page_title =  'Create Post';
if(isset($_POST['submit'])){

    $post = trim($_POST['post']);
    if(!empty($_POST['post'])) {

        $query = "INSERT INTO posts (post, user_id, username, post_time) VALUES (:post,'" . $_SESSION['user_id'] . "', '" . $_SESSION['username'] . "', NOW())";
        $stmt = $dbh->prepare($query);
        $results = $stmt->execute(array(
            'post' => $post
        ));
        if($results){
            echo '<p>Your post was successful <a href="index.php">click here</a>  to see more posts.</p><br />';
            echo $post;
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include('navbar.php');
?>
    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
        <label for="post">Post:</label>
        <textarea class="form-control" rows="5" name="post" maxlength="140" style="min-width: 10%"></textarea>
            </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
</body>
</html>
