<?php
require_once('start_session.php');

include_once('authenticate.php');

$page_title = "Homepage";
// connect to post databse to create a table for all posts
$dbh = new PDO ('mysql:host=localhost;dbname=blurtdb', 'root', 'root');
// If the session vars aren't set, try to set them with a cookie
$query = "SELECT username, post_id, post FROM posts WHERE username IS NOT NULL ORDER BY id DESC";
$stmt = $dbh -> prepare($query);
$stmt -> execute();
$results = $stmt -> fetchAll();

?>

<!DOCTYPE html>
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
<body>
<nav id="main-menu">
    <ul class="nav-bar">
        <?php
        // Include navbar here
        include_once ('navbar.php');
        ?>
    </ul>
</nav>
<?php
$dbh = new PDO ('mysql:host=localhost;dbname=blurtdb;', 'root', 'root');
$query = "SELECT * FROM posts WHERE username IS NOT NULL ORDER BY post_time DESC";
$stmt = $dbh ->prepare($query);
$stmt ->execute();
$data = $stmt->fetchAll();

// Loop through the array of user data, formatting it as HTML

echo '<table style="align-content: center; text-align: center">';
foreach ($data as $row) {
    if (isset($_SESSION['user_id'])) {
        echo '<tr><td><a href="profile.php?user_id=' . $row['user_id'] . '">' . $row['username'] . '</a></td>';
    } else {
        echo '<tr><td>' . $row['username'] . '</td>';
    }
    echo '<td><p>'. $row['post'] .'</p></td>';
}
echo '</table>';

?>


<div class="feed-container">
    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username">@<a href="#">OK</a></div>
                <p>I'm a lil annoyed lol.</p>
            </div>
        </div>

        <!-- Testing out the favorite button to see if i can add a counter to it so the user can like it-->

        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favoriteOK(){
                            var click = 0;
                            favorited = false;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicksok").innerHTML = click;

                            }
                            else if(click === 1 || favorited == true) {
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicksok").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                    <a id="Fclicksok">&nbsp;0</a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repostOK(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicksok").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicksok").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicksok">0</a>


            <div class="footer-right"> <button type="button" onClick="repostOK()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favoriteOK()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>

        <!-- Testing code ends here-->

    </div>

    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username">@<a href="#">fishbones</a></div>
                <p>new champion soon?!?!</p>
            </div>
        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favoriteFB(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicksfb").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicksfb").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicksfb">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repostFB(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicksfb").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicksfb").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicksfb">0</a>


            <div class="footer-right"> <button type="button" onClick="repostFB()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favoriteFB()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>
    </div>

    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username">@<a href="#">draculad</a></div>
                <p>why do i keep breaking my bones tho </p>
            </div>
        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favoriteD(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicksd").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicksd").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicksd">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repostD(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicksd").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicksd").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicksd">0</a>


            <div class="footer-right"> <button type="button" onClick="repostD()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favoriteD()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>
    </div>

    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username">@<a href="#">aliensRreal1999</a></div>
                <p>gillian anderson is still queen tbh</p>
            </div>
        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favoriteAR(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicksar").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicksar").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicksar">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repostAR(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicksar").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicksar").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicksar">0</a>


            <div class="footer-right"> <button type="button" onClick="repostAR()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favoriteAR()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>
    </div>

    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username">@<a href="#">garlicbread99</a></div>
                <p>u know, i dont even like spaghetti </p>
            </div>
        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favoriteGB(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicksgb").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicksgb").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicksgb">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repostGB(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicksgb").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicksgb").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicksgb">0</a>


            <div class="footer-right"> <button type="button" onClick="repostGB()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favoriteGB()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>
    </div>

    <div class="feed-border clearfix">
        <div class="feed-options"><i class="fa fa-sort-desc"></i></div>
        <div class="feed-body clearfix">
            <div class="feed-avatar">
                <img src="http://cdn.shopify.com/s/files/1/0761/2225/t/8/assets/profileIconCustom.png?7584684197308184343" alt="" />
            </div>
            <div class="feed-content">
                <div class="username">@<a href="#">kobracorn</a></div>
                <p>im really sick of sweet corn gettin all the credit.
                    <br/> down with sweet corn 2k16!!!
                </p>
            </div>
        </div>
        <div class="feed-footer clearfix">
            <div class="footer-left">



                <span class="footer-time"><script type="text/javascript">
                        function favoriteKC(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclickskc").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclickskc").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclickskc">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repostKC(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclickskc").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclickskc").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclickskc">0</a>


            <div class="footer-right"> <button type="button" onClick="repostKC()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favoriteKC()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>
    </div>
</div>
</body>

