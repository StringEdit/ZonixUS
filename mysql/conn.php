<?php
    function mconn($type){
        $array = [
            "site" => [
                "host" => 'localhost',
                "username" => 'root',
                "password" => '',
                "database" => 'gladeye'
            ],
            "luckperms" => [
                "host" => 'mysql3.joinserver.ru',
                "username" => 'u51583_CKfWGdYLH5',
                "password" => 'cuxTHaAhEL6PC@4Ki@n!G2lZ',
                "database" => 's51583_ranks'
            ]
        ];

        if($type == 'site'){
            return $conn = mysqli_connect($array['site']['host'], $array['site']['username'], $array['site']['password'], $array['site']['database']);
        } else if($type == 'luckperms'){
            return $conn = new mysqli($array['luckperms']['host'], $array['luckperms']['username'], $array['luckperms']['password'], $array['luckperms']['database']);
        } else {
            exit;
        }
    }
    function madd($type, $table, $columns, $values){
        mconn($type)->query("INSERT INTO `$table` ($columns) 
            VALUES ($values)");
    }

    function mremove($type, $table, $where_column, $where_value){
        mconn($type)->query("DELETE FROM `$table` WHERE `$where_column` = '$where_value'");
    }

    function mupdate($type, $table, $selected, $value, $where_column, $where_value){
        mysqli_query(mconn($type), "UPDATE `$table` SET `$selected` = '$value' WHERE `$where_column` = '$where_value'");
    }

    function mtruncate($type, $table){
        mconn($type)->query("TRUNCATE `$table`");
    }

    function mget($type, $table, $selected, $where_column, $where_value){
        $result = mysqli_query(mconn($type), "SELECT * FROM `$table` WHERE `$where_column` = '$where_value'");
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)) {
                 return $row[$selected];
            }
        }
    }

    function mgetListAll($type, $table){
        $query = mysqli_query(mconn($type), "SELECT * FROM `$table`");
        if(mysqli_num_rows($query) > 0){
            $list = [];
            while($row = mysqli_fetch_assoc($query)) {
                array_push($list, $row);
            }
            return $list;
        }
    }

    function mgetList($type, $table, $where_column, $where_value){
        $query = mysqli_query(mconn($type), "SELECT * FROM `$table` WHERE `$where_column` = '$where_value'");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)) {
                return $row;
            }
        }
    }

    function mexists($type, $table, $where_column, $where_value){
        $query = mysqli_query(mconn($type), "SELECT * FROM `$table` WHERE `$where_column` = '$where_value'");
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)) {
                return true;
            }
        } else {
            return false;
        }
    }

    function mcountrows($type, $table){
        $query = mysqli_query(mconn($type), "SELECT * FROM `$table`");
        return mysqli_num_rows($query);
    }