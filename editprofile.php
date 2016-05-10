<?php
include ('start_session.php');
include_once('authenticate.php');
require('variables.php');
$dbh = new PDO('mysql:host=localhost;dbname=blurtdb', 'root', 'root');

if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $first_name = trim($_POST['firstname']);
    $last_name = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $description = trim($_POST['description']);
    $old_picture = trim($_POST['old_picture']);
    $new_picture = trim($_FILES['new_picture']['name']);
    $new_picture_type = $_FILES['new_picture']['type'];
    $new_picture_size = $_FILES['new_picture']['size'];
    list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
    $error = false;

    // Validate and move the uploaded picture file, if necessary
    if (!empty($new_picture)) {
        if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') ||
                ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
            ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) {
            if ($_FILES['file']['error'] == 0) {
                // Move the file to the target upload folder
                $target = MM_UPLOADPATH . basename($new_picture);
                if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                    // The new picture file move was successful, now make sure any old picture is deleted
                    if (!empty($old_picture) && ($old_picture != $new_picture)) {
                        @unlink(MM_UPLOADPATH . $old_picture);
                    }
                }
                else {
                    // The new picture file move failed, so delete the temporary file and set the error flag
                    @unlink($_FILES['new_picture']['tmp_name']);
                    $error = true;
                    echo '<p class="error">Sorry, there was a problem uploading your picture.</p>';
                }
            }
        }
        else {
            // The new picture file is not valid, so delete the temporary file and set the error flag
            @unlink($_FILES['new_picture']['tmp_name']);
            $error = true;
            echo '<p class="error">Your picture must be a GIF, JPEG, or PNG image file no greater than ' . (MM_MAXFILESIZE / 1024) .
                ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
        }
    }

    // Update the profile data in the database
    if (!$error) {
        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($description)) {
            // Only set the picture column if there is a new picture
            if (!empty($new_picture)) {
                $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, " .
                    "picture = :new_picture WHERE user_id = '" . $_SESSION['user_id'] . "'";
            }
            else {
                $query = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, " .
                    "WHERE user_id = '" . $_SESSION['user_id'] . "'";
            }
            $stmt = $dbh ->prepare($query);
            $stmt->execute(array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'new_picture' => $new_picture,
                'description' => $description,
                'user_id' => $_SESSION['user_id']));

                $_SESSION['$description'] = $description;
            // Confirm success with the user
            echo '<p>Your profile has been successfully updated. Would you like to <a href="viewprofile.php">view your profile</a>?</p>';

            exit();
        }
        else {
            echo '<p class="error">You must enter all of the profile data (the picture is optional).</p>';
        }
    }
}
?>
<html>
    <body>
    <?php
    include('navbar.php');
    ?>
        <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>"/>
            <fieldset>
                <legend>Personal Information</legend>
                <label for="firstname">First name:</label>
                <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>"/><br/>
                <label for="lastname">Last name:</label>
                <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>"/><br/>
                <label for="email">Email:</label>
                <input type="email" id="email" value="<?php if(!empty($email))  echo $email; ?>">
                <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>"/>
                <br>
                <label for="new_picture">Picture:</label>
                <input type="file" id="new_picture" name="new_picture"/>
                <?php if (!empty($old_picture)) {
                    echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
                } ?>
                <label for="description">Description:</label>
                <input type="text" id="description" value="<?php if(!empty($description)) echo $description; ?>">
            </fieldset>
            <input type="submit" value="Save Profile" name="submit"/>
        </form>
    </body>
</html>
