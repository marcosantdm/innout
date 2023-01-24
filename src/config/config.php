<?php

date_default_timezone_set('America/Fortaleza');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//Pastas

/* Definindo a constante MODEL_PATH que direciona para o diretorio do arquivo dentro de
dirname(__FILE__) concatenando com a pasta escolhida /../models */
define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
/* Chamando o  */
require_once(realpath(dirname(__FILE__) . '/database.php'));