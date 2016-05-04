<?php
<<<<<<< HEAD
require_once('start_session.php');
include_once('authenticate.php');


// If the session vars aren't set, try to set them with a cookie
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
=======
$username = $_SESSION['username'];
print_r($username);
require_once('authenticate.php');

require_once('start_session.php');

$dbh = new PDO('mysql:host=127.0.0.1;dbname=blurtdb;', 'root' ,'root');

$query = "SELECT user_id, post, post_number FROM posts ORDER BY post_number ASC";
$stmt = $dbh -> prepare($query);
$stmt -> execute();
$data = $stmt -> fetchAll();
echo '<h2>Recent Feed</h2>';
echo '<table>';
foreach($data as $row){

>>>>>>> bccaf5e0e340247d02a32065d1742fc2eca12ee6
}
echo '</table>'
?>
<!DOCTYPE html>
<html>
<head>
    <script src="jquery-2.1.4.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <title>Latest Activity</title>
</head>
<body>

<div class="allholder">

    <div class="navoverlay"></div>
    <div class="nav">
        <div id="logo-center" class="centered">
            <img height=70 width=90 src="Blurt.png">
        </div>
        <ul>
            <li class="selected"> <i class="fa fa-newspaper-o "></i> <a href="view.php">Other profiles</a> </li>
            <li> <i class="fa fa-briefcase"></i> <a href="profile.php">Profile</a> </li>
            <li> <i class="fa fa-send"></i> <a href="logout.php">Log Out</a> </li>
        </ul>
    </div>

    <div id="content">
        <div class="feed">

            <div class="feed-item blog">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">aliensRreal1990</div>
                    <div class="feed-description"> !!!! New episode of X Files tonight!!!!</div>
                </div>


                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>


            <div class="feed-item">
                <div class="icon-holder col-1-5"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">garlicbread99</div>
                    <div class="feed-description">Can't believe how good the Batman and Superman movie was! Thought it would be terrible!</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>


            <div class="feed-item">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">kobracorn</div>
                    <div class="feed-description">r u kiddin me @draculad </div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">draculad</div>
                    <div class="feed-description">i broke my middle finger this morning when i woke up and smacked my(now, also broken)alarm clock :')</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder col-1-5"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">unubtaste-ium</div>
                    <div class="feed-description">school make me wanna die ijs</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">Xandar09</div>
                    <div class="feed-description">the new Guardians of the Galaxy was announced !!!!!!!!!! :D</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">pyneapplexpress</div>
                    <div class="feed-description">y lyf so hard man</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder col-1-5"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">nickiminajismywife</div>
                    <div class="feed-description">lit !!! *fire emoji*</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">patriots</div>
                    <div class="feed-description">#FreeBrady</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>

            <div class="feed-item">
                <div class="icon-holder"><div class="icon"></div></div>
                <div class="text-holder col-3-5">
                    <div class="feed-title">Nick Cl0cks!n</div>
                    <div class="feed-description">Broncos Suck, Patriots are the BEST team in the league!!!!!!!!!!!!!!!!</div>
                </div>
                <div class="post-options-holder">
                    <div class= "tools">
                        <i class="fa fa-ellipsis-v" id="postsettings"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bodyholder">
    <div class="status-bar">
        <div id="logoutbut">
            <a href="#" id="logout">Log Out</a>
        </div>
    </div>
    <div class="toolbar">
        <div id="toolbar">
            <i class="fa fa-bars"></i>
        </div>

        <div id="apptitle"><h1>News Feed</h1></div>

        <div class="tools">
            <ul>
                <li><i class="fa fa-search" id="search"></i></li>
                <li><i class="fa fa-ellipsis-v" id="settings"></i></li>
            </ul>
        </div
    </div>

    <div class="filters">
        <ul>
            <li id="blog-filter">Blog</li>
            <li id="portfolio-filter">Portfolio</li>
        </ul>
    </div>


    <div id="plus"><i class="fa fa-pencil fa-lg icon"></i></div>
</div>


<div id="activityform">
    <div id="formHolder">
        <form action="" id="newActivity">
            <header><h2>Post a New Activity</h2></header>
            <div>   <label class="desc" id="title1" for="Field1">Title: </label>
                <div>   <input id="activityTitle" name="Field1" type="text" value="" tabindex="1">
                </div>
            </div>

            <div>   <label class="desc" id="description1" for="Field2">Description: </label>
                <div>   <textarea id="activityDescription" name="Field2" spellcheck="true" rows="9" col="50" tabindex="2"></textarea>
                </div>
            </div>

            <div>   <label class="desc" id="description3" for="category">Category:</label>
                <div>   <select id="activityCatagory" name="category" tabIndex="3">
                        <option value="na">- Select -</option>
                        <option value="blog">Blog</option>
                        <option value="portfolio">Porfolio</option>
                    </select>
                </div>
            </div>
            <div><input id="saveForm" name="saveForm" type="submit" value="Submit"></div>
        </form>
    </div>

    <div id="spacer"></div>

    <div id="register">
        <form action="" id="login">
            <header><h2>Don't Forget to Login</h2></header>

            <div>   <label class="labelStyle" id="logintitle1" for="loginField1"> Email:</label>
                <div>   <input id="loginInput" name="loginField1" type="text" value="" tabindex="3">
                </div>
            </div>


            <div>   <label class="labelStyle" id="logintitle2" for="loginField2">Password:</label>
                <div>   <input id="pwField" name="loginField2" type="password" value="" tabindex="4">
                </div>
            </div>
            <br />

            <input id="registerForm" name="registerForm" type="submit" value="Register">
            <input id="finalloginForm" name="loginForm" type="submit" value="Login">

            <div id="forget">
                <a href="#">Forgot your password?</a><br>
                <a href="#">Forgot your username?</a>
            </div>
        </form>
    </div>
</div>

<?php

session_destroy();
?>
<footer><p>&copy Blurt 2016</p></footer>
</body>
</html>