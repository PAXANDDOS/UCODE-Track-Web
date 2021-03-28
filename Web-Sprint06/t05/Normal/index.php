<?php
namespace Space\Normal;
use \Datetime;

function calculate_time()
{
    $start = new DateTime("1939-01-01");
    return $start->diff(new DateTime("now"));
}

?>