<?php
include('start_session.php');
include_once('authenticate.php');
include('bootstrap.php');
include_once('navbar.php');
//Connect to database
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
if(isset($_GET['id'])){
    // If session select user information
    $query = "SELECT * FROM users WHERE id = '" . $_GET['user_id'] . "'";
    $stmt = $dbh -> prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
}

if (!isset($_GET['user_id'])) {
    $query = "SELECT username, first_name, last_name, description FROM users WHERE id = '" . $_GET['user_id'] . "'";
    $stmt = $dbh -> prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
    //$error = error_log(0);
    //print_r($error);
}
else {
    $query = "SELECT username, first_name, , description FROM users WHERE id = '" . $_GET['user_id'] . "'";
    $stmt = $dbh -> prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
}
//$_SESSION['id'] = 1;
//echo $_SESSION['id'] . "<- session";
foreach ($data as $row) {
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_GET['username']; ?>'s Profile</title>
    <link rel="stylesheet" href="profile.css" type="text/css">
    <link rel="stylesheet" href="index.css" type="text/css">
</head>
<body>
<div class="user-profile">
    <img class="avatar" src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTF_erFD1SeUnxEpvFjzBCCDxLvf-wlh9ZuPMqi02qGnyyBtPWdE-3KoH3s" alt="Ash" />
    <div class="username"><?php echo $row['username'];?></div>
    <div class="bio">

    </div>
    <div class="description">
        <?php
        echo $row['description'];
        ?>
    </div>
</div>
<br />
<?php
}
$dbh = new PDO ('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
$query = "SELECT * FROM posts WHERE user_id = '" . $_GET['user_id'] .  "' ORDER BY post_time DESC";
$stmt = $dbh ->prepare($query);
$stmt ->execute();
$data = $stmt->fetchAll();
foreach($data as $row){
?>
<div class="feed-container">
    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" style="margin-left: 48%"/>
            </div>
            <div class="feed-content">
                <div class="username"><p style="text-align: center">@<?php echo $row['username']; ?></p></div>
                <p style="text-align: center;"><?php echo $row['post'] ?></p>
            </div>
        </div>
        </div>
    </div>
        <?php
        }
        ?>
</body>
</html>

