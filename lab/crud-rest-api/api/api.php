<?php

class API {
    private $connect = '';
    
    function __construct(){
        $this->db_connect();
    }

    function db_connect(){
        $this->connect = new PDO('mysql:host=localhost;dbname=php_udemy', 'phpmyadmin', '130293');
    }

    function fetch_all(){
        $query = "SELECT id, first_name, last_name FROM lead ORDER BY id";

        $startment = $this->connect->prepare($query);

        if($startment->execute()){
            while($row = $startment->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        } else {
            die("Query unsucessifull");
        }
        
    }
    
}