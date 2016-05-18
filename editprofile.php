<?php
include ('start_session.php');
include_once('authenticate.php');
require('variables.php');

$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');

if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $username = $_POST['username'];
    $error = false;


    // Update the profile data in the database
    if (!$error) {
        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($description)) {
            // Only set the picture column if there is a new picture
            if (!empty($new_picture)) {
                $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, description = :description, username = :username WHERE id = :user_id";
            }
            else {
                $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, description = :description, username = :username WHERE id = :user_id";
            }
            $stmt = $dbh->prepare($query);
            $stmt->execute(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'description' => $description,
                'username' => $username,
                'user_id' => $_SESSION['user_id']
            ));
            // Confirm success with the user
            echo '<p>Your profile has been successfully updated. Would you like to <a href="profile.php">view your profile</a>?</p>';
            exit();
        }
        else {
            echo '<p class="error">You must enter all of the profile data (the picture is optional).</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit <?php echo $_SESSION['username'] ?>'s Profile</title>
</head>
    <body style="background-color: #19bbfd;}">
    <?php
    include('navbar.php');
    include('bootstrap.php');
    ?>
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend>Personal Information</legend>
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>"/><br/>
                <label for="lastname">Last name:</label>
                <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>"/><br/>
                <label for="username">Username:</label>
                <input name="username" type="text" id="username" value="<?php if(!empty($username)) echo $username ?>"/><br />
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php if(!empty($email))  echo $email; ?>">
                <br />
                <label for="description">Description:</label><br />
                <textarea name="description">
                </textarea>
            </fieldset>
            <input type="submit" value="Save Profile" name="submit"/>
        </form>
    </body>
</html>
