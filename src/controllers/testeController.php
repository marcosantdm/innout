<?php

// controller temporario


loadModel('WorkingHours');


$wh = WorkingHours::loadFromUserAndDate(1, date('Y-m-d'));
echo '<hr>';
$WorkedIntervalString = $wh->getWorkedInterval()->format('%H:%I:%S');
print_r($WorkedIntervalString);
echo '<hr>';

$lunchIntervalString = $wh->getLunchInterval()->format('%H:%I:%S');
print_r($lunchIntervalString);
echo '<hr>';

print_r($wh->getExitTime());