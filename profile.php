<?php
include('start_session.php');
include_once('authenticate.php');
include_once('navbar.php');
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
    <?php echo $_SESSION['username']; ?>
    <?php echo $_SESSION['first_name']; ?>
    <?php echo $_SESSION['last_name']; ?>
    <?php echo $_SESSION['email']; ?>
    <!-- User information given in account making -->
    <?php echo $_SESSION['description']; ?>
</div>

