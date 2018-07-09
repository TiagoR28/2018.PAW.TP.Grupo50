<?php

require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;  

require_once (Conf::getApplicationUtilsPath() . 'Validations.php');
use Validations as MyValidations;

$validar = filter_input(INPUT_POST, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_POST;
    $problemas = ['absentismo', 'indisciplina'];
    $cont = 0;
    
    $idUser = 1;
    $prob =  filter_input($type, 'radio', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = 'aberto';
    $criado = date_default_timezone_set('Europe/Lisbon');
    $limite =  filter_input($type, 'Limite', FILTER_SANITIZE_SPECIAL_CHARS);
    
    
    $erros['Limite'] = MyValidations::validateDate($limite);
    $erros['prob'] = MyValidations::validateRadio($prob, $problemas);
    
    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $cont++;
        }
    }
    
    if ($cont == 0) {
        
        echo 'Processo criado com sucesso';
    }    
}