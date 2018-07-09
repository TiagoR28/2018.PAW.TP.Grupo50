<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ConsultaManeger.php');
require_once (Conf::getApplicationModelPath() . 'Consultas.php');
require_once (Conf::getApplicationManagerPath() . 'UtenteManeger.php');

require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;


$validar = filter_input(INPUT_POST, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_POST;
    $tipoS = ['Reunioes', 'Pedidos', 'Encaminhamentos'];
    $count = 0;

    $IdDossier = 1;     // TODO: implementar sessoes
    $IdProc = 1;        // TODO: implementar sessoes
    $Descricao = filter_input($type, "descricao", FILTER_SANITIZE_MAGIC_QUOTES);
    $Solucao = filter_input($type, "tipo", FILTER_SANITIZE_MAGIC_QUOTES);
    $data = date_default_timezone_set('Europe/Lisbon');
    
    $erros['descricao'] = MyValidations::validateString($Descricao, 1, 500);
    $erros['TS'] = MyValidations::validateRadio($Solucao, $tipoS);
    
    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $count++;
        }
    }
    
    if ($count == 0) {
//        $CM = new ConsultaManager();
//        $C = new Consultas();
//        $CM->createConsulta($C->createObject(NULL, $nUtente, $idFunc, NULL, $entrada, NULL, NULL, $idHosp));        
    } 
    
}