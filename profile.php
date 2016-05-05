<?php
include('start_session.php');
include_once('authenticate.php');
include_once('navbar.php');
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
    if(isset($_SESSION['user_id'])){
        $query = "SELECT * FROM users WHERE user_id = '" . $_SESSION['id'] . "'";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['username']; ?>'s Profile</title>
    <!-- Whatever we decide to chose to have show on the page will work out on the tab putting the information wanted on this tab -->
</head>
<body>
<?php echo $_SESSION['profile_pic']; ?>
<div id="infoBox_Profile">
    <form>

        <label>Username: <?php echo $_SESSION['username'] ?></label> <br>
        <label> First Name: <?php echo $_SESSION['first_name']; ?></label> <br>
        <label> Last Name: <?php echo $_SESSION['last_name']; ?></label> <br>
        <label> Email: <?php echo $_SESSION['email']; ?></label> <br>
    <!-- User information given in account making -->
        <label> Description: <?php echo $_SESSION['description']; ?></label> <br>
    </form>
</div>

