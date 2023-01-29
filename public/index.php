<?php

/* Na função dirname, o segundo parâmetro é a quantidade de diretórios que você quer voltar. 
No caso, voltamos 2 diretórios, o primeiro é o próprio diretorio raiz do arquivo (public), já o segundo é 
para acessar o diretorio innout, se fosse 3 voltaria 3 diretórios, e assim por diante. */
// O arquivo config.php está configurado para chamar o arquivo database.php, por isso não é 
// necessário chamar o arquivo database.php
require_once(dirname(__FILE__, 2) . '/src/config/config.php'); 

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if($uri === '/' || $uri === '' || $uri === 'index.php') {
    $uri = '/loginController.php';
}

require_once(CONTROLLER_PATH . "/{$uri}");