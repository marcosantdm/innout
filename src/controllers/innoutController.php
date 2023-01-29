<?php
session_start();
requireValidSession();

loadModel('WorkingHours');

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = new IntlDateFormatter(
        'pt_BR',
        IntlDateFormatter::NONE,
        IntlDateFormatter::NONE,
        'America/Fortaleza',
        IntlDateFormatter::GREGORIAN,
        'HH:mm:ss'
    );

    
    $formattedTime = $currentTime->format(time());

    if($_POST['forcedTime']) {
        $formattedTime = $_POST['forcedTime'];
    }

    $records->innout($formattedTime);
    addSuccessMessage('Ponto Registrado com Sucesso!');
} catch (AppException $e) {

    addErrorMessage($e->getMessage());
}

header('Location: pointRegisterController.php');
