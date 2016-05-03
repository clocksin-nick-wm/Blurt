<?php ?>
<form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>"/>
    <fieldset>
        <legend>Personal Information</legend>
        <label for="firstname">First name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>"/><br/>
        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>"/><br/>
        <label for="email">Email:</label>
        <input type="email" id="email"
        <input type="hidden" name="old_picture" value="<?php if (!empty($old_picture)) echo $old_picture; ?>"/>
        <label for="new_picture">Picture:</label>
        <input type="file" id="new_picture" name="new_picture"/>
        <?php if (!empty($old_picture)) {
            echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
        } ?>
    </fieldset>
    <input type="submit" value="Save Profile" name="submit"/>
</form>

<script src="scripts.js"></script>
<div id="description">
    <button onclick="prompt1()">Add a description for this profile</button><div id="bio1" style="margin-top: 5px; word-wrap: break-word"></div>
</div>
</body>
</html>
