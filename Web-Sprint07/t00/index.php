<?php
error_reporting(0);
session_start();
if (empty($_SESSION['counter']) || !$_COOKIE['refreshCount']) {
    $_SESSION['counter'] = 1;
    setcookie("refreshCount", $_SESSION['counter'], time() + 60);
} 
else {
    $_SESSION['counter']++;
    setcookie("refreshCount", $_SESSION['counter'], time() + 60);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie counter</title>
</head>

<body>
    <h1>Cookie counter</h1>
    <p>This page was loaded
        <span> 
            <?php 
                if(!$_COOKIE['refreshCount'])
                    echo 1;
                else 
                    echo $_COOKIE['refreshCount']; 
            ?> 
        </span>
    time(s) in last minute</p>
</body>

</html>
