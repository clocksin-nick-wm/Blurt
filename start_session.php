<?php
session_start();
<<<<<<< HEAD
if (isset($_SESSION['id'])) {
    if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
        $_SESSION['id'] = $_COOKIE['id'];
=======
if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
>>>>>>> 12a4914ed9115f7c8738522652ea539e8ee9befe
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
?>