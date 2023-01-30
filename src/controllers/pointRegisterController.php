<?php
session_start();

requireValidSession();


$date = (new DateTime())->getTimestamp();

// $today = strftime('$d de $B de $Y', $date); FUNÇÃO DESCONTINUADA

$today = new IntlDateFormatter(
    'pt_BR',
    IntlDateFormatter::LONG,
    IntlDateFormatter::LONG,
    'America/Sao_Paulo',
    IntlDateFormatter::GREGORIAN,
    "dd 'de' MMMM 'de' yyyy"

);

$formattedDate = $today->format($date);
loadTemplateView('pointRegister', ['today' => $formattedDate]);
