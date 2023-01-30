<?php
error_reporting(0);
session_start();
requireValidSession();

$exception = null;

if(count($_POST) > 0) {   
    try {
        $newUser = new User($_POST);
        $newUser->insert();
        addSuccessMessage('Usuário cadastrado com sucesso!');
        $_POST = [];
    } catch (Exception $e) {
        $exception = $e;
    }
}
    
loadTemplateView('saveUser', $_POST + ['exception' => $exception]);