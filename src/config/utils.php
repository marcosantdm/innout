<?php

function addSuccessMessage() {
    $_SESSION['message'] = [
        'type' => 'success',
        'message' => 'Ponto Registrado com Sucesso!'
    ];
}

function addErrorMessage($msg) {
    $_SESSION['message'] = [
        'type' => 'error',
        'message' => $msg,
    ];
}