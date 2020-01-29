



<?php

$data_url = 'https://api.acrcloud.com/v1/monitor-streams/s-DN5fdGT/results?access_key=63100295363396bdeac78ab8df282c4a';

//For Form Data
$filename = "data.txt";
$stream_result = array();
$stream_result['stream_id'] = $_POST['stream_id'];
$stream_result['stream_url'] = $_POST['stream_url'];
$stream_result['stream_data'] = json_decode($_POST["data"], true);  #monitor result body.
$stream_result['stream_status'] = $_POST["status"];  ##status=0 means data is No Result.
 
//save result to mysql, redis or file
file_put_contents($filename, json_encode($stream_result)."\n", FILE_APPEND);
echo "OK";


?>