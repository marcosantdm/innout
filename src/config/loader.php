<?php

/*
 * Função criada para facilitar o carregamento de arquivos
 * Sem a necessidade de usar o comando MODEL_PATH . '/arquivo'
 * Utilizando apenas o comando loadModel('arquivo') ex: loadModel('User');
 */

function loadModel($modelName) {
    //concatenando o nome do arquivo com a extensão .php
    require_once(MODEL_PATH . "/{$modelName}.php");

}

// No caso do loadView, o segundo paramentro é um array que deve ser inserido para a view ser lida
function loadView($viewName, $params = array()) {

    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }
    //concatenando o nome do arquivo com a extensão .php
    require_once(VIEW_PATH . "/{$viewName}.php");

}

function loadTemplateView($viewName, $params = array()) {

    if(count($params) > 0) {
        foreach($params as $key => $value) {
            if(strlen($key) > 0) {
                ${$key} = $value;
            }
        }
    }
    //concatenando o nome do arquivo com a extensão .php
    require_once(TEMPLATE_PATH . "/header.php");
    require_once(TEMPLATE_PATH . "/left.php");
    require_once(VIEW_PATH . "/{$viewName}.php");
    require_once(TEMPLATE_PATH . "/footer.php");

}