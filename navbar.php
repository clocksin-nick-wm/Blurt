<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
           <a href="index.php"> <img src="Blurt.png" width="75px" height="50px"></a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] ?></a></li>
            <li><a href="editprofile.php"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></li>
            <li><a href="chat.php">Chat</a> </li>
            <li><a href="notif.html">Notifications</a> </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li ><a href="newpost.php"><span class="glyphicon glyphicon-edit"></span> Create Post</a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a> </li>
        </ul>
    </div>
</nav>