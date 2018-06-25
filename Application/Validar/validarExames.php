<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ExameManeger.php');
require_once (Conf::getApplicationModelPath() . 'Exames.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;

$validar = filter_input(INPUT_GET, 'enviar');

if (isset($validar)) {

    $erros = array();
    $generos = ['M', 'F'];
    $type = INPUT_GET;
    $count = 0;
    
    $medico = 3;    // Vem da sessão 
    $consulta = filter_input($type, 'id', FILTER_SANITIZE_NUMBER_INT);  
    $exame = filter_input($type, 'tipoExame');
    $obs = filter_input($type, 'obs', FILTER_SANITIZE_MAGIC_QUOTES);
    print_r($exame);
    
    $erros['consulta'] = MyValidations::validateString($obs, 0, 500);
    
    foreach ($erros as $key => $value) {
         if (!empty($value)) {
             $count++;
         }
    } 

    if ($count == 0) {
//        $UM = new UtenteManager();
//        $U = new Utente();
//        $UM->createUtente($U->createObject($id, $nome, $data, $genero, $morada));
    }
}