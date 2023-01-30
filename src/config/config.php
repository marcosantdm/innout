<?php
date_default_timezone_set('America/Fortaleza');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//Definindo as constantes para o diretorio do projeto

define('DAILY_TIME', 60 * 60 * 8);

/* Definindo a constante MODEL_PATH que direciona para o diretorio do arquivo dentro de
dirname(__FILE__) concatenando com a pasta escolhida /../models para que na hora de fazer
o require_once(local do arquivo) não precise colocar todo o diretorio*/

//Pastas

define('MODEL_PATH', realpath(dirname(__FILE__) . '/../models'));
define('VIEW_PATH', realpath(dirname(__FILE__) . '/../views'));
define('TEMPLATE_PATH', realpath(dirname(__FILE__) . '/../views/template'));
define('CONTROLLER_PATH', realpath(dirname(__FILE__) . '/../controllers'));
define('EXCEPTION_PATH', realpath(dirname(__FILE__) . '/../exceptions'));

/* Chamando os arquivos para importar no começo  */

//Arquivos

require_once(realpath(dirname(__FILE__) . '/database.php'));
require_once(realpath(dirname(__FILE__) . '/loader.php'));
require_once(realpath(dirname(__FILE__) . '/session.php'));
require_once(realpath(dirname(__FILE__) . '/dateUtils.php'));
require_once(realpath(dirname(__FILE__) . '/utils.php'));
require_once(realpath(MODEL_PATH . '/Model.php'));
require_once(realpath(MODEL_PATH . '/User.php'));
require_once(realpath(MODEL_PATH . '/WorkingHours.php'));
require_once(realpath(EXCEPTION_PATH . '/AppException.php'));
require_once(realpath(EXCEPTION_PATH . '/ValidationException.php'));
