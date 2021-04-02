<?php
    session_start();
    error_reporting(0);

    echo("<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Hack it!</title>
    </head>
    <body>");
?>
<h1>Password</h1>
<?php 
    function showStart()
    {
        echo("<span>Password not saved at session.</span>
        <form action=\"index.php\" method=\"post\">
            <label>Password for saving to session </label><input type=\"password\" name=\"passTo\" placeholder=\"Password to session\" autofocus required><br>
            <label>Salt for saving to session </label><input type=\"password\" name=\"salt\" placeholder=\"Salt to session\" required><br>
            <input type=\"submit\" value=\"Save\">
        </form>");
    }
    function showCheck($hash)
    {
        echo("<span>Password saved at session.</span>
        <label>Hash is $hash</label>
        <form action=\"index.php\" method=\"post\">
            <label>Try to guess: </label><input type=\"password\" name=\"passFrom\" placeholder=\"Password to session\">
            <input type=\"submit\" value=\"Check password\">
        </form>
        <form action=\"index.php\" method=\"post\">
            <input type=\"text\" name=\"clear\" value=\"true\" style=\"display: none;\">
            <input type=\"submit\" value=\"Clear\">
        </form>
        ");
    }
    if($_POST) {
        if($_POST['clear'] == "true") {
            unset($_SESSION['hash']);
            unset($_SESSION['salt']);
            session_destroy();
            session_start();
            showStart();
        }
        else if($_POST['passFrom']) {
            if($_SESSION['hash'] == crypt($_POST['passFrom'], $_SESSION['salt'])) {
                echo("<p style=\"color: green;\">Hacked!</p>");
                session_destroy();
                session_start();
                showStart();
            }
            else {
                echo("<p style=\"color: red;\">Access denied!</p>");
                showCheck($_SESSION['hash']);
            }
        }
        else {
            $pass = $_POST['passTo'];
            $_SESSION['salt'] = $_POST['salt'];
            $_SESSION['hash'] = crypt($pass, $_SESSION['salt']);
            showCheck($_SESSION['hash']);
        }   
    }
    else {
        showStart();
    }
?>