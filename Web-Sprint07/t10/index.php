<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport\" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Make square image</title>
</head>
<body>
<h1>Make square image</h1>
<form action="index.php" method="post">
    <input type="url" name="url" placeholder="Image url (jpg/jpeg)..."><br>
    <input type="submit" value="GO">
    <span id="not">Try:</span><span>https://cdn.discordapp.com/attachments/701503404513427466/827092695117594654/47aa8d8062b315026553a5dc935fcb8e.jpg</span>
</form>

<?php 
    error_reporting(0);
    if($_POST['url']) {
        $url = $_POST['url'];
        $original = 'original.jpg';
        $ch = curl_init($url);
        $fp = fopen($original, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        $resourse = imagecreatefromjpeg($original);
        imagefilter($resourse, IMG_FILTER_COLORIZE, 255, 0, 0);
        imagejpeg($resourse, "red.jpg");

        $resourse = imagecreatefromjpeg($original);
        imagefilter($resourse, IMG_FILTER_COLORIZE, 0, 255, 0);
        imagejpeg($resourse, "green.jpg");

        $resourse = imagecreatefromjpeg($original);
        imagefilter($resourse, IMG_FILTER_COLORIZE, 0, 0, 255);
        imagejpeg($resourse, "blue.jpg");

        echo("<div class=\"grid\">");
        echo("<img src=\"original.jpg\" alt=\"Your image\">");
        echo("<img src=\"red.jpg\" alt=\"Your image\">");
        echo("<img src=\"green.jpg\" alt=\"Your image\">");
        echo("<img src=\"blue.jpg\" alt=\"Your image\">");
        echo("</div>");
    }
?>