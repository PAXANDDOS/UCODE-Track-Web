<?php

require_once("connection/Connector.php");
require_once("models/Model.php");
require_once("models/Database.php");

if($_POST) {
    $user = new User();
    $user->username = trim($_POST['username']);
    $user->renew();
}

echo '
<script>
    window.location.href = "http://localhost:3000/t02/index.html";
</script>
';
?>