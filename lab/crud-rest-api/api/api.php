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
        } 
    }

    function insert() {
        if(isset($_POST['first_name'])){
            $form_data = array(
                ':first_name'   => $_POST['first_name'],
                ':last_name'   => $_POST['last_name']
            );
            $query = "INSERT INTO lead VALUES (default, :first_name, :last_name)";
            $startment = $this->db_connect->prepare($query);
            if($startment->execute($form_data)){
                $data[] = array(
                    'success'   => '1'
                );
            } else {
                $data[] = array(
                    'success'   => '0'
                );
            }
        } else {
            $data[] = array(
                'success'   => '0'
            );
        }
    }

}