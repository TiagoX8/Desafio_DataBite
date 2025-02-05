<?php


function getDataFromAPI($endpoint) {
    $url = 'https://v3.football.api-sports.io/' . $endpoint;
    $headers = [
        'x-apisports-key: cc2c9eeff6a1ba34e09e8a34568158a0' 
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    
    return json_decode($response, true); 
}
?>