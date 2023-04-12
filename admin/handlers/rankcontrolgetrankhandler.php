<?php
    require_once '../../mysql/conn.php';
    $nick = filter_var(trim($_POST['nickName']), FILTER_UNSAFE_RAW);

    if(mexists('luckperms', 'luckperms_players', 'username', "$nick")){
        $getrank = mget('luckperms', 'luckperms_players', 'primary_group', 'username', "$nick");
        setcookie('rankcontrolgetrankrank', $getrank, time()+5, '/');
        header('Location: /admin/rankscontrol.php');
    } else{
        header('Location: /admin/handlers/notfoundrankscontrolhandler.php');
    }
exit;
