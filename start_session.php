<?php
session_start();
<<<<<<< HEAD
if (isset($_SESSION['user_id'])) {
=======
if (!isset($_SESSION['user_id'])) {
>>>>>>> 7272fe450d8ba6a1e51c5054636e899239c4c5c5
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
        $_SESSION['user_id'] = $_COOKIE['user_id'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
}
?>