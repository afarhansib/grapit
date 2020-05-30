<?php

// simpan cookie
define("COOKIE", "YOUR LARAVEL SESSION COOKIE HERE");

// dapatkan file
$json_file = file_get_contents('data.json');
//jadikan assoc array 
$json_data = json_decode($json_file, true); 
// var_dump($json_data['data']);

$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Cookie: laravel_session=" . COOKIE
  )
);

$context = stream_context_create($opts);

// susun url
$url = 'https://www.dicoding.com/secondary?';
foreach ($json_data['data'] as $data) {
  $url .= 'courseInvitationStudyProgress%5B%5D=' . $data['tokenid'] . '&';
};
$url .= 'additonalTypes%5B%5D=courseInvitationStudyProgress&additonalTypes%5B%5D=freshChat';

// ambil data dengan url diatas
$api_data = file_get_contents($url, false, $context);
// var_dump($api_data);

$api_data_parsed = json_decode($api_data);
// var_dump($api_data_parsed);

// simpan waktu saat ini
array_push($json_data['timestamp'], round(microtime(true) * 1000));
// ambil hanya data progressnya
$progress_data = $api_data_parsed->data->additional->courseInvitationStudyProgress;
// loop untuk disimpan ke dalam data json
for ($i = 0; $i < count($json_data['data']); $i++) {
  $json_data['data'][$i]['progress'][] = $progress_data->{$json_data['data'][$i]['tokenid']};
}

// jadikan json lagi
$json_data_encoded = json_encode($json_data);
// var_dump($json_data_encoded);

// simpan kedalam file
file_put_contents('data.json', $json_data_encoded);
echo "data saved!";

?>