<?php
include('start_session.php');
include_once('authenticate.php');
include_once('navbar.php');
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
    if(isset($_SESSION['id'])){
        $query = "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'";
    }
if (!isset($_GET['user_id'])) {
    $query = "SELECT username, first_name, last_name, email, description, picture FROM users WHERE id = '" . $_SESSION['id'] . "'";
    $stmt = $dbh -> prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
    $error = error_log();
    print_r($error);
}
else {
    $query = "SELECT username, first_name, last_name, email, description, picture FROM users WHERE id = '" . $_GET['id'] . "'";
    $stmt = $dbh -> prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetchAll();
}
if (count($data) == 1) {
    // The user row was found so display the user data
    $row = $data[0];
    echo '<table>';
    if (!empty($row['username'])) {
        echo '<tr><td class="label">Username:</td><td>' . $row['username'] . '</td></tr>';
    }
    if (!empty($row['first_name'])) {
        echo '<tr><td class="label">First name:</td><td>' . $row['first_name'] . '</td></tr>';
    }
    if (!empty($row['last_name'])) {
        echo '<tr><td class="label">Last name:</td><td>' . $row['last_name'] . '</td></tr>';
    }
    if (!empty($row['description'])) {
        echo '<tr><td class="label">Description:</td><td>' . $row['description'] . '</td></tr>';
    }
    if (!empty($row['picture'])) {
        echo '<tr><td class="label">Picture:</td><td><img src="' . MM_UPLOADPATH . $row['picture'] .
            '" alt="Profile Picture" /></td></tr>';
    }
    echo '</table>';
    if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
        echo '<p>Would you like to <a href="editprofile.php">edit your profile</a>?</p>';
    }
} // End of check for a single row of user results
else {
    echo '<p class="error">There was a problem accessing your profile.</p>';
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
        <label>First Name: <? echo $_SESSION['first_name']?></label> <br>
        <label>Last Name: <?php echo $_SESSION['last_name'] ?></label> <br>
        <label>Email: <?php echo $_SESSION['email'] ?></label> <br>
    <!-- User information given in account making -->
        <label>Description: <?php echo $_SESSION['description'] ?></label> <br>
    </form>
</div>

