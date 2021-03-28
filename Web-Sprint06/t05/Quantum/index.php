<?php

namespace Space\Quantum;
use \Datetime;

function calculate_time():array 
{
    $start = new DateTime("1939-01-01");
    $diff = $start->diff(new DateTime("now"));
    $quantumYears = 1;
    for($i = 0; $i<$diff->format("%Y"); $i++){
        if($i==7||$i==14||$i==21||$i==28||$i==35||$i==42||$i==49||$i==56||$i==63||$i==70||$i==77||$i==84||$i==91||$i==98||$i==105)
            $quantumYears++;
    }
    $quantumMonths = $diff->format("%m") + 4;
    $quantumDays = $diff->format("%d");
    return [$quantumYears,$quantumMonths,$quantumDays];
}

?>