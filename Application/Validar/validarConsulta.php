<?php

require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;  

require_once (Conf::getApplicationUtilsPath() . 'Validations.php');
use Validations as MyValidations;

$validar = filter_input(INPUT_GET, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_GET;
    $exames = ['jaTem', 'nao'];
    $internamentos = ['sim', 'nao'];
    
    $obs = filter_input($type, 'obs', FILTER_SANITIZE_SPECIAL_CHARS);
    $exame = filter_input($type, 'exames');
    $intenamento = filter_input($type, 'internamento');
    
    $erros['obs'] = MyValidations::validateString($obs, 3, 50);
    $erros['exame'] = MyValidations::validateRadio($exame, $exames);
    $erros['inter'] = MyValidations::validateRadio($intenamento, $internamentos);
    
    print_r($erros);
    
}