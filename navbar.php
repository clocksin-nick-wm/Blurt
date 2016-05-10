<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="Blurt.png" width="75px" height="50px">
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><a href="editprofile.php">Edit Profile</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li ><a href="newpost.php"><span class="glyphicon glyphicon-pencil"></span> Create Post</a></li>
            <li><a href="logout.php">Logout (<?php echo $_SESSION['username'] ?>)</a> </li>
        </ul>
    </div>
</nav>