<?php
    if(isset($_COOKIE['user']) == false){
        header('Location: /index.php');
    } else {
        $cnick = $_COOKIE['user'];
        $nick = mexists('site', 'users', 'nick', "$cnick");
        if($nick){
            require_once 'header.php';
        } else{
            setcookie('user', '', time()-604800, '/');
            header('Location: /index.php');
        }
    }
?>