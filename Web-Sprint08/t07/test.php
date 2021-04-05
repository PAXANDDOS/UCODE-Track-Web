<?php

function autoload($pClassName) { include(__DIR__. '/' . $pClassName. '.php'); }
spl_autoload_register("autoload");

$heroes = new Heroes();

$heroes->find(10);

$heroes->id = 11;
$heroes->delete();

$heroes->id = 11;
$heroes->name = "PAXANDDOS";
$heroes->description = "Does nothing and nothing";
$heroes->race = "dude";
$heroes->class_role = "healer";
$heroes->save();

?>