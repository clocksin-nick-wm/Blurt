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
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                    <a id="Fclicks">&nbsp;0</a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicks">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

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
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicks">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicks">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

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
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicks">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicks">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

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
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicks">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicks">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

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
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicks">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicks">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

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
                        function favorite(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Fclicks").innerHTML = click;

                            }
                        }

                    </script>Favorite:</span>

                <a id="Fclicks">&nbsp;0</a>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <span class="footer-time"><script type="text/javascript">
                        function repost(){
                            var click = 0;
                            if(click === 0 || favorited == false){
                                click += 1;
                                favorited = true;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                            else{
                                click -= 1;
                                favorited = false;
                                document.getElementById("Rclicks").innerHTML = click;

                            }
                        }

                    </script>Resposts:</span>
            </div>

            <a id="Rclicks">0</a>


            <div class="footer-right"> <button type="button" onClick="repost()"><img src="http://i.imgur.com/A9qM0Vz.png" width="20px" height="20px"  draggable="false" "></div>

            <div class="footer-right"> <button type="button" onClick="favorite()"><img src="http://i.imgur.com/pUsG2BS.png" width="20px" height="20px"  draggable="false" "></div>

        </div>
    </div>
</div>
</body>

