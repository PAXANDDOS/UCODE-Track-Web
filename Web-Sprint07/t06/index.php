<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notepad mini</title>
</head>
<body>
<style>
    form {
        display: flex;
        flex-direction: column;
        width: fit-content;
    }
    select, textarea, input[type="submit"] {
        margin-top: 15px;
    }
</style>
<h1>Notepad mini</h1>
<form method="post">
    <input type="text" name="name" placeholder="Name" required>
    <select name="importance">
        <option selected>low</option>
        <option>medium</option>
        <option>high</option>
    </select>
    <textarea name="content" placeholder="Text of note..." required></textarea>
    <input type="submit" name="create" value="Create">
</form>

<?php
    error_reporting(0);
    function autoload($pClassName) { include(__DIR__. '/' . $pClassName. '.php'); }
    spl_autoload_register("autoload");
    define("FILE", "notes.json");
    $file = fopen(FILE, "c");
    $json = file_get_contents(FILE); $notes;

    if ($json) $notes = unserialize(json_decode($json));
    else $notes = array();

    if ($_GET && $_GET["delete_note"])
        foreach ($notes as $note)
            if ($_GET["delete_note"] == $note->getName()) {
                unset($notes[array_search($note, $notes)]); break;
            }
    if ($_POST || $_GET["delete_note"]) {
        $delete = false;
        foreach ($notes as $note)
            if ($_POST["name"] && $_POST["content"] && $_POST["name"] == $note->getName()) {
                $note->setContent($_POST["content"]);
                $delete = true;
                break;
            }
        if ($_POST["name"] && $_POST["content"] && !$delete) {
            $note = new Note($_POST["name"], $_POST["importance"], $_POST["content"]);
            array_push($notes, $note);
        }
        file_put_contents(FILE, json_encode(serialize($notes)));
    }
    
    $result = new NotePad($notes);
    echo("<h2>List of notes</h2>");
    echo($result);
    if ($_GET && $_GET["note_content"]) {
        echo('<h2>Detail of "'.$_GET["note_content"].'"</h2>');
        echo($result->getNoteWithName($_GET["note_content"]));
    }
    fclose($file);
?>