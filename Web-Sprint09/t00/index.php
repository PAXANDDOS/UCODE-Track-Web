<?php

require_once("connection/Connector.php");
require_once("models/Model.php");
require_once("models/Database.php");

if($_POST) {
    $user = new User();
    $user->username = trim($_POST['username']);
    $user->name = trim($_POST['name']);
    $user->email = trim($_POST['email']);
    $user->password = md5($_POST['password']);
    $user->role = 'user';
    $user->save();
}

echo '
<script>
    window.location.href = "http://localhost:3000/t00/index.html";
</script>
';
?>