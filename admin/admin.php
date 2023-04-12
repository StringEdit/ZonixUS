<?php
    require_once '../mysql/conn.php';
    require_once 'checkaccess.php';
?>
<body>
<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        Welcome, <?=$_COOKIE['user']?>!
    </div>
    <?php
        $user = $_COOKIE['user'];
        $access = mget('site', 'users', 'access', 'nick', "$user");
        $liststaff = mgetListAll('site', 'users');
        $sitecontrolaccess = ""; // 3 lvl access
        $staffcontrolaccess = ""; // 2 lvl access
        $rankscontrolaccess = ""; // 1 lvl access
        if($access<3){
            $sitecontrolaccess = "disabled";
        }
        if($access<2){
            $staffcontrolaccess = "disabled";
        }
        if($access<1){
            $rankscontrolaccess = "disabled";
        }
    ?>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin rules <span class="badge bg-danger">Important</span></h5>
                    <p class="card-text">Click on the button to read the admin rules</p>
                    <a href="/admin/adminrules.php" class="btn btn-primary">Read</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Quick panel</h5>
                    <p class="card-text">Click on the button to go another page</p>
                    <a href="/admin/staffcontrol.php" class="btn btn-primary <?=$staffcontrolaccess?>">Staff control</a>
                    <a href="/admin/rankscontrol.php" class="btn btn-success <?=$rankscontrolaccess?>">Ranks control</a>
                    <a href="/admin/sitecontrol.php" class="btn btn-danger <?=$sitecontrolaccess?>">Site control</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body" id="listtable">
                    <h5 class="card-title">Staff</h5>
                    <script>
                        $(document).ready(function(){
                            var liststaff = <?php echo json_encode($liststaff)?>;
                            var cardbody = document.getElementById('listtable');
                            var table = document.createElement('table');
                            var thead = document.createElement('thead');
                            var theadtr = document.createElement('tr');
                            var theadthsharp = document.createElement('th');
                            var theadthnick = document.createElement('th');
                            var theadthaccess = document.createElement('th');
                            var theadthwarns = document.createElement('th');
                            var tbody = document.createElement('tbody');

                            $(table).attr('class', 'table table-striped');

                            $(theadthsharp).attr('scope', 'col');
                            $(theadthsharp).text('#');
                            $(theadthnick).attr('scope', 'col');
                            $(theadthnick).text('Nick');
                            $(theadthaccess).attr('scope', 'col');
                            $(theadthaccess).text('Access');
                            $(theadthwarns).attr('scope', 'col');
                            $(theadthwarns).text('Warns');
                            $(theadthsharp).appendTo(theadtr);
                            $(theadthnick).appendTo(theadtr);
                            $(theadthaccess).appendTo(theadtr);
                            $(theadthwarns).appendTo(theadtr);
                            $(theadtr).appendTo(thead);
                            $(thead).appendTo(table);
                            for(elem in liststaff){
                                var theadtr = document.createElement('tr');
                                var theadth = document.createElement('th');
                                var theadthnick = document.createElement('td');
                                var theadthaccess = document.createElement('td');
                                var theadthwarns = document.createElement('td');
                                $(theadth).attr('scope', 'row');
                                $(theadth).text(liststaff[elem]['id']);
                                $(theadthnick).text(liststaff[elem]['nick']);
                                $(theadthaccess).text(liststaff[elem]['access']);
                                $(theadthwarns).text(liststaff[elem]['warns']);
                                $(theadth).appendTo(theadtr);
                                $(theadthnick).appendTo(theadtr);
                                $(theadthaccess).appendTo(theadtr);
                                $(theadthwarns).appendTo(theadtr);
                                $(theadtr).appendTo(tbody);
                            }
                            $(tbody).appendTo(table);
                            $(table).appendTo(cardbody);
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
