

<?php
$json_string = 'https://api.acrcloud.com/v1/monitor-streams/s-DN5fdGT/results?access_key=63100295363396bdeac78ab8df282c4a';


$dir = "data.txt";
if(!is_writable($dir)){
    echo "cannot write to file";
}

if (!empty($_REQUEST["search"])) {
    $input = $_REQUEST["search"];
   
    $bitecount = file_put_contents($dir, $input, FILE_APPEND);
}
echo $bitecount . " bites were written to the file";

// // Get the contents of the JSON file 
// $strJsonFileContents = file_get_contents("data.txt");
// // Convert to array 
// $array = json_decode($strJsonFileContents, true);
// var_dump($array); // print array


?>