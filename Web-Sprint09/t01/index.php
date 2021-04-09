<?php

require_once("connection/Connector.php");
require_once("models/Model.php");
require_once("models/Database.php");
session_start();
error_reporting(E_ERROR | E_PARSE);

if($_POST) {
    if($_POST['logout'] == 'true') {
        session_destroy();
        echo '<script>
            window.location.href = "http://localhost:3000/t01/index.html";
        </script>';
    }
    $_SESSION['username'] = trim($_POST['username']);
    $_SESSION['password'] = md5($_POST['password']);
    $user = new User();
    $user->username = $_SESSION['username'];
    $user->password = $_SESSION['password'];
    $user->check();
}

?>