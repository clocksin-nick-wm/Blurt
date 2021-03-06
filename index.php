<?php
require_once('start_session.php');

include_once('authenticate.php');

$page_title = "Homepage";
// connect to post databse to create a table for all posts
$dbh = new PDO ('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
// If the session vars aren't set, try to set them with a cookie
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <title>Blurt <?php echo $page_title ?></title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body style="background-color: rgb(34, 104, 195)">
<div class="posts">

    <?php

        // Include navbar here
        include_once ('navbar.php');
        ?>
<?php
$query = "SELECT * FROM posts WHERE username IS NOT NULL ORDER BY post_time DESC";
$stmt = $dbh ->prepare($query);
$stmt ->execute();
$data = $stmt->fetchAll();

// Loop through the array of user data, formatting it as HTML
foreach ($data as $row) {


?>
<br />
    <br />
<div id="'navbar" class="feed-container">

    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username"><a href="<?php echo 'view.php?user_id=' . $row['user_id'] .' '; ?>"><p>@<?php if($row['username']){
                            echo $row['username']; }
                            else {
                                echo "Unknown User";
                            }?></p></a></div>
                <p><?php echo $row['post'] ?></p>
            </div>
        </div>


        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("favoriteClick").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("favoriteClick").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                    <a id="favoriteClick">&nbsp;0</a>




                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("repostClick").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("repostClick").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>
            <a id="repostClick">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>



    </div>

</div>
    <?php
    }

    ?>
    </div>
<style>
    #sideNav{
      background-color: #fefbfb;
        color: #858383;
        width:25%;
        position: fixed;
        top:0%;
        border-radius:10px;
        align-content: center;
        text-align: center;


    }
</style>

    <div id="sideNav">
        <a href="profile.php">
        <img class="img-circle person" src="Billy%20Profile.jpg-large" alt="Ash" width="200px" height="200px"/>
        </a>
        <h1 style="color: black"><?php echo $_SESSION['username']?></h1>

        <?php
        $dbh = new PDO ('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
       $query2 = "SELECT description FROM users WHERE id = '". $_SESSION['user_id'] ."'";
        $stmt = $dbh->prepare($query2);
        $stmt -> execute();
        $result = $stmt -> fetchAll();


        foreach($result as $row1){
            ?>
        <p style="color: black"><?php echo $row1['description'] ?></p>

            <?php
        }
        ?>
    </div>
</body>
</html>

