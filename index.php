<?php
    if(isset($_COOKIE['user']) == false){
        require_once 'login/header.php';
    } else {
        header('Location: /admin/admin.php');
    }
?>
<body>
<div class="container mt-5">
    <form action="login/handlerauth.php" method="post">
        <div class="form-floating">
            <input type="text" class="form-control" name="loginNick" id="loginNick" placeholder="Minecraft Nickname">
            <label for="loginNick">Minecraft Nickname</label>
        </div>
        <br>
        <div class="form-floating">
            <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Password">
            <label for="loginPass">Password</label>
        </div>
        <br>
        <button type="submit" class="btn btn-outline-success">Log-in</button>
    </form>
</div>
</body>