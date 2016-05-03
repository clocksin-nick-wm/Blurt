<?php ?>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />
    <fieldset>
        <legend>Personal Information</legend>
        <label for="firstname">First name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />
        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
            <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
        </select><br />
        <label for="birthdate">Birthdate:</label>
        <input type="text" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>" /><br />
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" /><br />
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php if (!empty($state)) echo $state; ?>" /><br />
        <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>" />
        <label for="new_picture">Picture:</label>
        <input type="file" id="new_picture" name="new_picture" />
        <?php if (!empty($old_picture)) {
            echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
        } ?>
    </fieldset>
    <input type="submit" value="Save Profile" name="submit" />
</form>

<script src="scripts.js"></script>
<div id="description">
    <button onclick="prompt1()">Add a description for this profile</button><div id="bio1" style="margin-top: 5px; word-wrap: break-word"></div>
</div>
</body>
</html>
