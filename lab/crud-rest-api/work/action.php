<?php 

if(isset($_POST['action'])){

    $a = $_POST['action'];
    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    
    if($a == 'insert'){

    } elseif($a == 'update'){
        $form_data = array(
            'first_name'    => $fn,
            'last_name'     => $ln,
        );

        $api_url = 'http://localhost/php/lab/crud-rest-api/api/test-api.php?action=insert'

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_POST, true);

        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_deconde($response true);

        foreach($result as $keys => $values){
            if($result[$keys]['success'] == '1'){
                echo 'insert;'
            } else {
                echo 'error';
            }
        }




    } elseif($a == 'delete'){

    } else {
        echo "Parameter error";
    }
}