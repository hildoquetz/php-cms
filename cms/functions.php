<?php
    require_once 'config.php';

        mb_internal_encoding('UTF-8');
    function db_connect(){
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$link){
            die("Error to connect to database: " 
            . mysqli_connect_errno() . " " . mysqli_connect_error());
        }
        return $link;
    }

    function db_query($query){
        $link = db_connect();
        mysqli_set_charset('utf8', $link);
        mysqli_query("SET character_set_results=utf8", $link);
        $r = mysqli_query($link, $query);
        if(!$r){
            die("Query error: " . mysqli_error($link));
        }
        mysqli_close($link);
        return $r;
    }


