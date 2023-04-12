<?php
    require_once '../mysql/conn.php';
    if(isset($_COOKIE['user']) == false){
        header('Location: /index.php');
    } else {
        setcookie('user', '', time()-604800, '/');
        header('Location: /index.php');
    }

    exit;