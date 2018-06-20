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
$morada = filter_input($type, 'morada', FILTER_SANITIZE_STRING);
$data = filter_input($type, 'bday', FILTER_SANITIZE_SPECIAL_CHARS);


$erros['nome'] = MyValidations::validateString($nome, 3, 50);
$erros['morada'] = MyValidations::validateString($morada, 3, 50);
$erros['bday'] = MyValidations::validateDate($data);
print_r($erros);

}