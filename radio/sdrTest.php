<!-- POST parameters: stream_id, stream_url, data

Read json and display title of track using php. This will print the item on your page. I use this in a shortcode via a shortcode plugin. -->

<?php
$json_string = 'https://api.acrcloud.com/v1/monitor-streams/s-D2ejMuV/results?access_key=3b16cd50d88ca52eee0c6c2b58eb261e';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
print_r($obj[0]['metadata']['music'][0]['title']);
?>

<!-- Read json and display artist of track using php. This will print the item on your page. I use this in a shortcode via a shortcode plugin. -->

<?php
$json_string = 'https://api.acrcloud.com/v1/monitor-streams/s-D2ejMuV/results?access_key=3b16cd50d88ca52eee0c6c2b58eb261e';
$jsondata = file_get_contents($json_string);
$obj = json_decode($jsondata,true);
print_r($obj[0]['metadata']['music'][0]['artists'][0]['name']);
?>

<!-- You can use these together easily across any standard PHP based site e.g., on a Wordpress site
Explanation of string url
https://api.acrcloud.com/v1/monitor-streams/ this is the standard stream url for monitoring
s-bVX73QK/ this is the ARC Cloud stream id available from your ARC account once set up in the console
results?access_key= enter this is to allow it to run the key in order to access the data
4709cb1d4bf05a8e782034797fxxxxxx this is the key linked with the stream with the stream id above. 
The key can be found in the console under the Broadcast Monitring tab on the left in your ACR console
You can see the results for our site being shown on our front page at https://fresh927.com.au -->



<?php
#For JSON Data
$filename = "sdrdata.lst";
$data = file_get_contents('php://input');
file_put_contents($filename, $data."\n", FILE_APPEND);
 

$json_data = json_decode($data, true);
$stream_id = $json_data["stream_id"];
$stream_url = $json_data["stream_url"];
$stream_result = $json_data["data"]; #monitor result body.
$stream_status = $json_data["status"]; #status=0 means data is No Result.
#do something...
 
echo "OK, lst";
?>

<?php
#For JSON Data
$filename = "sdrdata.txt";
$data = file_get_contents('php://input');
file_put_contents($filename, $data);
 

$json_data = json_decode($data, true);
$stream_id = $json_data["stream_id"];
$stream_url = $json_data["stream_url"];
$stream_result = $json_data["data"]; #monitor result body.
$stream_status = $json_data["status"]; #status=0 means data is No Result.
file_put_contents("sdrdata.txt", $json_data);
 
echo "OK, txt";
?>
  <!-- $newData = json_encode($data);

file_put_contents("data.txt", $newData); -->
<?php
$dir = "data.txt";
if(!is_writable($dir)){
    echo "cannot write to file";
}

if (!empty($_REQUEST["data"])) {
    
    $input = $_REQUEST["data"];
    $json_data = json_decode($input, true);
    $bitecount = file_put_contents($dir, $input, FILE_APPEND);
    $filename = "data.txt";
 
echo "yhre";
}
echo $bitecount . " bites were written to the file";
echo $title;

?>