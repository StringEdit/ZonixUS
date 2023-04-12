<?php
    require_once '../../mysql/conn.php';
    $nick = filter_var(trim($_POST['nickName']), FILTER_UNSAFE_RAW);
    $rank = $_POST['rank'];

    if(mexists('luckperms', 'luckperms_players', 'username', "$nick")){
        mupdate('luckperms', 'luckperms_players', 'primary_group', "$rank", 'username', "$nick");
        setcookie('rankcontrolsetranksuccess', 'true', time()+5, '/');
        header('Location: /admin/rankscontrol.php');
    } else{
        header('Location: /admin/handlers/notfoundrankscontrolhandler.php');
        exit;
    }
