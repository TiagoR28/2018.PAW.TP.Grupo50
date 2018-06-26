<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ConsultaManeger.php');
require_once (Conf::getApplicationModelPath() . 'Consultas.php');
require_once (Conf::getApplicationManagerPath() . 'UtenteManeger.php');

require_once (Conf::getApplicationUtilsPath() . 'Validations.php');


$validar = filter_input(INPUT_GET, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_GET;
    $format = 'Y-m-d';
    $UM = new UtenteManager();

    $nUtente = filter_input($type, 'utente', FILTER_SANITIZE_NUMBER_INT);
    $idFunc = 1;
    $entrada = date($format);
    $idHosp = 1;
    $aux = $UM->getUtentesByID($nUtente);
    
    if ($aux != NULL) {
        $CM = new ConsultaManager();
        $C = new Consultas();
        $CM->createConsulta($C->createObject(NULL, $nUtente, $idFunc, NULL, $entrada, NULL, NULL, $idHosp));        
    } else {
        $erros['nUtente'] = 'O Utnete não foi encontrado';
    }
    
}