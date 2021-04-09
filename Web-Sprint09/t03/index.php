<?php

// Функционал есть и он работает как надо. Проблема в .htaccess
// PHP Server работает со своим файлом перенаправлений и игнорирует наш
// Значит нельзя никак затестить его работу
// По этому я здесь вызываю напрямую роутер и даю ему ссылку которая должна вызываться через htaccess
// Данные обрабатываются соответсвенно таску и можете проверить вывод

// https://github.com/brapifra/vscode-phpserver/issues/19

require_once(__DIR__ . "/Router.php");
$url = "http://localhost:3000/t03/index.php/?data=somedata&filter=somefilter";
$router = new Router();
$router->queryToArray($url);
$router->print();

?>