<?php
namespace Space\Normal;
use \Datetime;

function calculate_time()
{
    $start = new DateTime("1939-01-01");
    return $start->diff(new DateTime("now"));
}
$time = calculate_time();
$days = $time->format("%d");
$months = $time->format("%m");
$years = $time->format("%Y");

echo "<!DOCTYPE html>\n<html>\n\n<head>\n  <meta charset=\"utf-8\">\n  <title>Quantum space</title>\n</head>\n\n<body>
  <p>In real life you were absent for $years years, $months months, $days days</p></body>\n\n</html>\n";

?>

