<?php

# I use a simple cURL command to grab the file off the server every 15 seconds via CRON

$ch = curl_init();
$source = "http://data.cabq.gov/transit/realtime/route/allroutes.kml";
curl_setopt($ch, CURLOPT_URL, $source);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec ($ch);
curl_close ($ch);

$destination = "allroutes-petroglyph.kml";
$file = fopen($destination, "w+");
fputs($file, $data);
fclose($file);
?>