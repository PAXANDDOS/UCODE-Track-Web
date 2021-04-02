<?php
    error_reporting(0);
    echo("<!DOCTYPE html>
    <html lang=\"en\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <title>Charset</title>
    </head>
    <body>");
?>
<h1>Charset</h1>
<form action="index.php" method="post">
    <p>Change charset: <input type="text" placeholder="Input string" name="input"></p>
    <p>Select charset or several charsets: 
    <select multiple name="select[]">
        <option>UTF-8</option>
        <option>ISO-8859-1</option>
        <option>Windows-1252</option>
    </select>
    <input type="submit" value="Change charset">
    <input type="submit" value="Clear" name="clear">
</form>
<?php
    if($_POST['input']) {
        if($_POST['clear']) {
            unset($_POST['input']);
            unset($_POST['clear']);
            unset($_POST['select']);
        }
        else {
            $input = $_POST['input'];
            echo("Input string: <textarea>$input</textarea><br>");
            if($_POST['select'][0]){
                $converted = mb_convert_encoding($input, $_POST['select'][0]);
                echo("UTF-8 <textarea>$converted</textarea><br>");
            }
            if($_POST['select'][1]){
                $converted = mb_convert_encoding($input, $_POST['select'][1]);
                echo("ISO-8859-1 <textarea>$converted</textarea><br>");
            }
            if($_POST['select'][2]){
                $converted = mb_convert_encoding($input, $_POST['select'][2]);
                echo("Windows-1252 <textarea>$converted</textarea><br>");
            }
        }
    }
?>