<?php

$text = "Mc Donald's https://goo.gl/maps/4ibdvwWDF7HWmXcSA";
preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $text, $match);
$hasil_link = implode("|",$match[0]);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hasil_link);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Must be set to true so that PHP follows any "Location:" header
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$a = curl_exec($ch); // $a will contain all headers
$link_baru = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$matches = [];
preg_match("/@(.*?),(.*?),/",$link_baru,$matches);
$place = $matches[0];
$lat = $matches[1];
$long = $matches[2];

echo '<br> Before          : '.$text;
echo '<br>';
echo '<br> After Selection : '.$hasil_link;
echo '<br>';
echo '<br> After Page Visit : '.$link_baru;
echo '<br>';
echo '<br>';
echo '<br> Array : '. print_r($matches);
echo '<br>';
echo '<br> Place : '. $place;
echo '<br>';
echo '<br> Latitude '. $lat;
echo '<br>';
echo '<br> Longitude '. $long;
//maps API AIzaSyDLiOPsrIqyV7EHrrfCKfgM1v5p9a6YsvM


?>