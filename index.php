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
<?php
$query = "SELECT * FROM users WHERE id = '" . $_SESSION['user_id'] . "'";
$stmt = $dbh -> prepare($query);
$results = $stmt -> fetchAll();
foreach($results as $row){
?>
<div class="user-profile" style="position:fixed;">
    <img class="avatar"
         src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTF_erFD1SeUnxEpvFjzBCCDxLvf-wlh9ZuPMqi02qGnyyBtPWdE-3KoH3s"
         alt="Ash"/>
    <div class="username"><?php echo $row['username']; ?></div>
    <div class="bio">

    </div>
    <div class="description">
        <?php
        echo $row['description'];
        ?>
    </div>
</div>
<style>
    #navbar {
        position: relative;
        top:0%;
        left:0%;




    }




</style>

<div class="posts">

    <?php
    }
        // Include navbar here
        include_once ('navbar.php');
        ?>
<?php
$dbh = new PDO ('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
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
        color: #FFFFFF;
        width:25%;
        height:100%;
        position: fixed;
        top:0%;
        border-radius:10px;



    }
</style>

    <div id="sideNav">
       <h1>HELLO</h1>

    </div>
</body>
</html>

