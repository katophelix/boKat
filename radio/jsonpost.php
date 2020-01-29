
<?php

$json_string = 'https://api.acrcloud.com/v1/monitor-streams/s-DN5fdGT/results?access_key=63100295363396bdeac78ab8df282c4a';
#For JSON Data
$filename = "data.txt";
$data = file_get_contents('php://input');
file_put_contents($filename, $data."\n", FILE_APPEND);


$json_data = json_decode($data, true);
$stream_id = $json_data["stream_id"];
$stream_url = $json_data["stream_url"];
$stream_result = $json_data["data"]; #monitor result body.
$stream_status = $json_data["status"]; #status=0 means data is No Result.
#do something...
 
echo "OK";
