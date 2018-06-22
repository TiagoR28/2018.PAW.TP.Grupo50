<?php

require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;  

require_once (Conf::getApplicationUtilsPath() . 'Validations.php');
use Validations as MyValidations;

$validar = filter_input(INPUT_GET, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_GET;
    
    $nome = filter_input($type, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input($type, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    MyValidations::validateString($string, 3, 50);
}