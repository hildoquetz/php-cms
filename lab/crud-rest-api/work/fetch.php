<?php 

$api_url = "http://localhost/php/lab/crud-rest-api/api/test-api.php?action=fetch_all";

// handle api url
$client = curl_init($api_url);

// allow curl response
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

// send to browser and get response
$response = curl_exec($client);

// decode json response into a php variable
$result = json_decode($response);

$output = '';

if(count($result) > 0){
    foreach($result as $row){
        $output .= "<tr>";
        $output .= "<td>$row->first_name</td>";
        $output .= "<td>$row->last_name</td>";
        $output .= '<td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="' . $row->id . '">Edit</button></td>';
        $output .= '<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row->id . '">Delete</button></td>';
        $output .= "</tr>";
    }
} else {
    $output = "<tr><td>Not found</td></tr>";
}

echo $output;