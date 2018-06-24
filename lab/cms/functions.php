<?php
    require 'config.php';

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
        $r = mysqli_query($link, $query);
        if(!$r){
            die("Query error: " . mysqli_error($link));
        }
        mysqli_close($link);
        return $r;
    }


