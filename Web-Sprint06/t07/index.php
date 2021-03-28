<?php
echo("
<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');
* {
    font-family: 'Montserrat', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body { 
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    min-height:100vh;
    background:#16BFFD;
    background: -webkit-linear-gradient(to right, #CB3066, #1691fd);
    background: linear-gradient(to right, #CB3066, #1691fd);
    background-size: 400% 400%;
    animation: gradient 15s ease infinite;
}
@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
div {
    width:70%;
    padding: 2%;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    backdrop-filter: blur(15px);
    border-top: 1px solid rgba(255, 255, 255, 0.2);
    border-left: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
}
p {
    font-weight: 400;
    font-size: 1em;
    color: rgba(255,255,255,0.7);
    cursor: default;
    margin: 2% 0;
}
b {
    font-weight: 700;
    font-size: 1em;
    color: white;
    cursor: default;
}
</style>");

echo("<div data-tilt data-tilt-reverse=\"true\" data-tilt-max=\"4\" data-tilt-full-page-listening>");
$current = $_SERVER['PHP_SELF'];
echo("<p><b>A name of file of the executed script:</b> $current</p>");

$current = $_SERVER['argv'];
echo("<p><b>Arguments passed to the script:</b> $current</p>");

$current = $_SERVER['HTTP_HOST'];
echo("<p><b>IP address of the server:</b> $current</p>");

$current = $_SERVER['SERVER_NAME'];
echo("<p><b>A name of current that invoke current script:</b> $current</p>");

$current = $_SERVER['SERVER_PROTOCOL'];
echo("<p><b>A name and a version of the information protocol:</b> $current</p>");

$current = $_SERVER['REQUEST_METHOD'];
echo("<p><b>A query method:</b> $current</p>");

$current = $_SERVER['HTTP_USER_AGENT'];
echo("<p><b>User-Agent information:</b> $current</p>");

$current = $_SERVER['REMOTE_ADDR'];
echo("<p><b>IP address of the client:</b> $current</p>");


foreach ($_SERVER['argv'] as $key) {
    echo($key);
}
echo("</div>");
// foreach ($_SERVER as $key => $v) {
//     echo("$key - " .$_SERVER[$key].'<br>');
// }
?>