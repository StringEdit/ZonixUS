<?php
    require_once '../mysql/conn.php';
    require_once 'checkaccess.php';
    $user = $_COOKIE['user'];
    $access = mget('site', 'users', 'access', 'nick', "$user");

    if(isset($_COOKIE['rankcontrolgetrankrank']) == false){
        $getrankvalue = "Type nickname for get rank";
    }else{
        $getrankvalue = $_COOKIE['rankcontrolgetrankrank'];
    }

    if($access<1){
        header('Location: /index.php');
    }
?>

<body>
<div class="container mt-5">
    <?php
        if(isset($_COOKIE['user']) == false){
            exit;
        }
        if($_COOKIE['rankcontrolsetranksuccess'] == 'true'):
    ?>
    <div class="alert alert-success" role="alert">
        Success! Rank updated!
    </div>
    <?php endif;?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Set rank <span class="badge bg-danger">Danger</span></h5>
                    <form action="/admin/handlers/rankcontrolsetrankhandler.php" method="post">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="nickName" id="nickName" placeholder="Minecraft Nickname">
                            <label for="nickName">Minecraft Nickname</label>
                        </div>
                        <br>
                        <div>
                            <select class="form-select" aria-label="Choose rank" name="rank">
                                <option disabled>Choose rank</option>
                                <option selected value="default">Default</option>
                                <option value="vip">VIP</option>
                                <option value="vipp">VIP+</option>
                                <option value="mvp">MVP</option>
                                <option value="mvpp">MVP+</option>
                                <option value="mvppp">MVP++</option>
                                <option value="youtube">YOUTUBE</option>
                                <option value="helper">HELPER</option>
                                <option value="mod">MOD</option>
                                <option value="admin">ADMIN</option>
                                <option value="coowner">COOWNER</option>
                                <option value="owner">OWNER</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Get rank</h5>
                    <form action="/admin/handlers/rankcontrolgetrankhandler.php" method="post">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="nickName" id="nickName" placeholder="Minecraft Nickname">
                            <label for="nickName">Minecraft Nickname</label>
                        </div>
                        <br>
                        <?php
                            $rank = "";
                            if($getrankvalue=='default'){
                                $rank = "DEFAULT";
                            } else if($getrankvalue=='vip'){
                                $rank = "VIP";
                            }else if($getrankvalue=='vipp'){
                                $rank = "VIP+";
                            }else if($getrankvalue=='mvp'){
                                $rank = "MVP";
                            }else if($getrankvalue=='mvpp'){
                                $rank = "MVP+";
                            }else if($getrankvalue=='mvppp'){
                                $rank = "MVP++";
                            }else if($getrankvalue=='youtube'){
                                $rank = "YOUTUBE";
                            }else if($getrankvalue=='helper'){
                                $rank = "HELPER";
                            }else if($getrankvalue=='mod'){
                                $rank = "MOD";
                            }else if($getrankvalue=='admin'){
                                $rank = "ADMIN";
                            }else if($getrankvalue=='coowner'){
                                $rank = "CO-OWNER";
                            }else if($getrankvalue=='owner'){
                                $rank = "OWNER";
                            }else{
                                $rank = $getrankvalue;
                            }
                        ?>
                        <input class="form-control" type="text" value="<?=$rank?>" aria-label="Disabled input example" disabled readonly>
                        <br>
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
