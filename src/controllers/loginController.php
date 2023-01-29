<?php
loadModel('Login');
$exception = null;

if(count($_POST) > 0) {
    // pode ser feito também enviando o array [email => $_POST, password => $_POST]
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        print_r($user);
        header("Location: pointRegisterController.php");
    } catch (AppException $e) {
        $exception = $e;
    }
}

/* 
* parametro $_POST enviado para que a view também receba os parametros enviados pelo formulário com o $_POST
* Mas caso no VALUE dentro do input do formulário seja passado o valor do $_POST['email'], 
* não é necessário enviar o $_POST para a view
*/
loadView('login', $_POST + ['exception' => $exception]);