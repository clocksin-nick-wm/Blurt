<?php
include_once('navbar.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_SESSION['username']; ?>'s Profile</title>
    <!-- Whatever we decide to chose to have show on the page will work out on the tab putting the information wanted on this tab -->
</head>
<body>
<div id="infoBox_Profile">
    <?php echo $_SESSION['username']; ?>
    <?php echo $_SESSION['first_name']; ?>
    <?php echo $_SESSION['last_name']; ?>
    <?php echo $_SESSION['email']; ?>
    <!-- User information given in account making -->
</div>
<script src="scripts.js"></script>
<div id="description">
    <button onclick="prompt1()">Add a description for this profile</button><div id="bio1" style="margin-top: 5px; word-wrap: break-word"></div>
</div>
</body>
</html>
