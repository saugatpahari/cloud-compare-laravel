<?php
$servername = "localhost";
$username = "root";
$password = "stranze@17";
$database = "cloud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else{
    require_once('vendor/autoload.php');

    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', 'https://api.vantage.sh/v1/products', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Bearer EC_j_L04t5H2moH-EcsL3DxI0Z9Cx5NKxWRqNuzFDfc',
        ],
    ]);

    $data = json_decode($response->getBody());

    for ($x = 0; $x < count($data->products); $x++) {
        mysqli_query($conn, "INSERT INTO `product`(
            `id`,
            `provider`, 
            `product_id`, 
            `product_name`, 
            `display_name`, 
            `vcpu`, 
            `memory`, 
            `gpu`, 
            `storage`, 
            `clock_speed`, 
            `physical_processor`, 
            `network_performance`
        ) VALUES (
            '$x+1'
            '$data->products[$x]->provider_id',
            '$data->products[$x]->id',
            '$data->products[$x]->name',
            '$data->products[$x]->details->name',
            '$data->products[$x]->details->vcpu',
            '$data->products[$x]->details->memory',
            '$data->products[$x]->details->gpu',
            '$data->products[$x]->details->storage',
            '$data->products[$x]->details->clock_speed_ghz',
            '$data->products[$x]->details->physical_processor_description',
            '$data->products[$x]->details->network_performance_description',
        )");    

    }
}
