<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'AcccoesManeger.php');
require_once (Conf::getApplicationModelPath() . 'Accoes.php');


require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;


$validar = filter_input(INPUT_POST, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_POST;
    $tipoS = ['Reunioes', 'Pedidos', 'Encaminhamentos'];
    $count = 0;

    $IdDossier = filter_input(INPUT_GET, 'idDoss', FILTER_SANITIZE_MAGIC_QUOTES);    
    $IdProc = filter_input(INPUT_GET, 'idPro', FILTER_SANITIZE_MAGIC_QUOTES);        
    $Descricao = filter_input($type, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
    $Solucao = filter_input($type, "tipo", FILTER_SANITIZE_MAGIC_QUOTES);
    $data = date('Y/m/d');
    
    $erros['descricao'] = MyValidations::validateString($Descricao, 1, 500);
    $erros['TS'] = MyValidations::validateRadio($Solucao, $tipoS);
    
    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $count++;
        }
    }
    
    if ($count == 0) {
        $CM = new AcccoesManeger();
        $C = new Accoes();
        $CM->createAccoes($C->createObject($IdDossier, $IdProc, $Descricao, $data, $Solucao));        
    } 
    
}