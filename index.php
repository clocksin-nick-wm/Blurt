<?php
require_once('start_session.php');

include_once('authenticate.php');

$page_title = "Homepage";
// If the session vars aren't set, try to set them with a cookie

?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
    <title>Latest Activity</title>
</head>
<body>
<nav id="main-menu">
    <ul class="nav-bar">
        <li class="nav-button-home"><a href="index.php">Home</a></li>
        <li class="nav-button-services"><a href="#">Chat</a></li>
        <li class="nav-button-products"><a href="notif_v2.php">Notifications</a></li>
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
        <div class="feed-footer clearfix">
            <div class="footer-left">
                <span class="footer-time">10 Favorites</span>
                <span class="footer-time">2 Resposts</span>
            </div>
        </div>
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
                <span class="footer-time">10 Favorites</span>
                <span class="footer-time">2 Resposts</span>
            </div>
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
                <span class="footer-time">1 Favorite</span>
            </div>
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
                <span class="footer-time">1 Favorite</span>
            </div>
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
                <span class="footer-time">4 Favorites</span>
                <span class="footer-time">3 Reposts</span>
            </div>
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
                <span class="footer-time">80 Favorites</span>
                <span class="footer-time">75 Reposts</span>
            </div>
        </div>
    </div>
</div>
</body>
</DOCTYPEhtml>

