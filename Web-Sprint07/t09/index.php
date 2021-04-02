<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport\" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Marvel API</title>
</head>
<body>
<h1>Comics from Marvel API</h1>
<?php

$API_BASE = "http://gateway.marvel.com/v1/public/comics?";
$timestamp = time();
$PUBLIC_KEY = "4fa591b1f91a17485d22bf2cc68e2c8b";
$PRIVATE_KEY = "51135e43cfa221cfa5a8d74d15a855757f99524d";
$HASH = md5($timestamp.$PRIVATE_KEY.$PUBLIC_KEY);
$api = $API_BASE."ts=".$timestamp."&apikey=".$PUBLIC_KEY."&hash=".$HASH;

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $api);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$json = curl_exec($curl);
curl_close($curl);
echo(parseJSON(json_decode($json, true)));

function parseJSON(mixed $json) {
    $output = "<div class=\"block\">";
    foreach ($json as $key => $value) {
        if (is_array($value)) {
            $output .= "<span id=\"head\"><br>$key:</span>";
            $output .= parseJSON($value);
        } 
        else {
            $output .= "
                <div>
                    <span id=\"key\">$key: </span>
                    <span id=\"value\">$value</span>
                </div>
            ";
        }
    }
    $output .= "</div>";
    return $output;
}

?>
