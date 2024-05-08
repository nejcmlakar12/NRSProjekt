<?php 
session_start();
    unset($_COOKIE['balance']);
    session_destroy();
    header("location:main.html");

?>