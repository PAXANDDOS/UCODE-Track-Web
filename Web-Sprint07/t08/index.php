<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport\" content="width=device-width, initial-scale=1.0">
    <title>Show other sites</title>
</head>
<body>
<h1>Show other sites</h1>
<div style="display: flex; flex-direction: row;">
    <form action="index.php" method="post">
        <input type="url" name="url" placeholder="url">
        <input type="submit" value="Go">
    </form>
    <form action="index.php" method="post" style="margin-left: 0.5%">
            <input type="text" name="back" value="true" style="display: none;">
            <input type="submit" value="BACK">
    </form>
</div>
<?php
    error_reporting(0);
    if($_POST['back'] == "true") {
        echo("<p>Type an URL...</p>");
    }
    if($_POST['url']) {
        echo("<div style=\"margin-left: 10px;\">");
        echo("<div style=\"margin: 10px 0 0 0; padding: 10px 0; border-top: 2px solid gray; border-bottom: 2px solid gray;\"><span>url: ".$_POST['url']."</span></div>");
        echo("<br><code>");
        $data = file_get_contents($_POST['url']);
        if(strpos($data, "<body>") !== false) {
            $data = explode("<body>", $data)[1];
            $data = explode("</body>", $data)[0];
            $data = "<body>".$data."</body>";
        }
        else if(strpos($data, "<body") !== false) {
            $data = explode("<body", $data)[1];
            $data = explode("</body>", $data)[0];
            $data = "<body".$data."</body>";
        }
        $data = str_replace("<", "&#60;", $data);
        $data = str_replace(">", "&#62;", $data);
        $data = nl2br($data);
        echo $data."</code></div>";
    }
?>