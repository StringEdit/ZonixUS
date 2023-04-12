<?php
    if(in_array('user', $_COOKIE) && $_COOKIE['user'] != ''){
        header('Location: /index.php');
    } else {
        require_once 'header.php';
    }
?>
<body>
<div class="container mt-5">
    <div class="alert alert-danger" role="alert">
        Incorrect username/password! <a href="/index.php">Try again</a>
    </div>
</div>
</body>