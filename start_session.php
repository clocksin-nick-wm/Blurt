<?php
session_start();
if (isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
        $_SESSION['first_name'] = $_COOKIE['first_name'];
        $_SESSION['last_name'] = $_COOKIE['last_name'];
        $_SESSION['email'] = $_COOKIE['email'];

    }
}
?>