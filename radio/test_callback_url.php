<?php

$result_data = '{"status": {"msg": "Success", "code": 0, "version": "1.0"},
 "result_type": 0, "metadata": {"type": "delay", "timestamp_utc": 
    "2019-05-07 00:07:08", "played_duration": 191, "music": 
    [{"album": {"name": "Mess Her Up"}, "play_offset_ms": 21380,
     "sample_begin_time_offset_ms": 240, "title": "Mess Her Up (Single Edit)", 
     "result_from": 3, "release_date": "2019-03-01", "sample_end_time_offset_ms": 9480, "genres": [{"name": "Alternative/Indie"}], "label": "Wonderlick", "db_end_time_offset_ms": 21260, "score": 100, "db_begin_time_offset_ms": 12020, "artists": [{"name": "Amy Shark"}], "duration_ms": 204580, "external_ids": {"isrc": ["AUBM01900026"], "upc": ["886447556443"]}, "acrid": "d8809d999b8a21a88c6a2a019bb8c961", "external_metadata": {"spotify": [{"album": {"name": "Mess Her Up", "id": "5CSCU90DSnBpCZNrQ2PE7B"}, "track": {"name": "Mess Her Up - Single Edit", "id": "3TZgPOKPqzvj2pS4AeGTAu"}, "artists": [{"name": "Amy Shark", "id": "2DORQjKJVYZMx9uu82UGtT"}]}], "deezer": [{"album": {"id": 87379562}, "track": {"name": "Mess Her Up (Single Edit)", "id": "632957172"}, "artists": [{"name": "Amy Shark", "id": 5566504}]}]}}], "record_timestamp": "20190507000708"}}';

$post_data = [
    "bucket_id" => "bucket_id",
    "stream_id" => "stream_id",
    "stream_name" => "stream_name",
    "stream_country" => "stream_country",
    "stream_url" => "http://98.101.223.10:8011",
    "data" => json_decode($result_data),
    "status" => 1,
    "user_defined" => [],
];

$encode_post_data = json_encode($post_data);

$callback_url = "https://saltydog.com/radio/data.txt";

$res = http_request($callback_url, $encode_post_data);

var_dump($res);

function http_request($url, $data = null)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    #curl_setopt($curl, CURLOPT_HEADER, true);
    if (!empty($data)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curl);

    $response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    var_dump($response);

    curl_close($curl);
    return $output;
}
