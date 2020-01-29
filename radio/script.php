<!-- Read json and display title of track using php. This will print the item on your page. I use this in a shortcode via a shortcode plugin. -->

<?php
$json_string = 'https://api.acrcloud.com/v1/monitor-streams/s-DN5fdGT/results?access_key=63100295363396bdeac78ab8df282c4a';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
// print_r($obj[0]['metadata']['music'][0]['title']);
// print_r($obj[0]['metadata']['music'][0]['artists'][0]['name']);

$title = ($obj[0]['metadata']['music'][0]['title']);
$artist = ($obj[0]['metadata']['music'][0]['artists'][0]['name']);


$array = array($title, $artist);

print_r($array);


// file_put_contents("data.txt", $array);
// file_put_contents("data.txt", serialize($array));

file_put_contents('data.txt', var_export($array, true));

?>


 