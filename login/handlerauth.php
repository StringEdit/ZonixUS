<?php
    require_once '../mysql/conn.php';
    $nick = filter_var(trim($_POST['loginNick']), FILTER_UNSAFE_RAW);
    $pass = filter_var(trim($_POST['loginPass']), FILTER_UNSAFE_RAW);
    $pass = md5($pass);

    if(mexists('site','users','nick', "$nick")){
        $passfromdb = mget('site', 'users', 'pass','nick', "$nick");
        if($passfromdb==$pass){
            setcookie('user', $nick, time()+604800, '/');
            header('Location: /admin/admin.php');
        } else{
            header('Location: /login/error.php');
        }
    } else {
        header('Location: /login/error.php');
    }

    exit;
