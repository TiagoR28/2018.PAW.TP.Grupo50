<?php

require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;  

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');
require_once (Conf::getApplicationModelPath() . 'Processo.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');
use Validations as MyValidations;

$validar = filter_input(INPUT_POST, 'enviar');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_POST;
    $problemas = ['absentismo', 'indisciplina'];
    $cont = 0;
    
    $idUser = $_SESSION["username"];
    $prob =  filter_input($type, 'radio', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = 'aberto';
    $criado = date('Y/m/d');
    $limite =  filter_input($type, 'Limite', FILTER_SANITIZE_SPECIAL_CHARS);
    
    if($limite instanceof DateTime) {
        $erros['Limite'] = 'O campo é obrigatorio';
    }
    
    if ($limite < date('Y/m/d')) {
        $erros['Limite'] = 'A data deve ser maior que a data atual';
    }
    
    $erros['prob'] = MyValidations::validateRadio($prob, $problemas);
    
    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $cont++;
        }
    }
    
    if ($cont == 0) {
        $Man = new ProcessoManeger();
        $Mod = new Processo();
        $Man->createProcesso($Mod->createObject(NULL, $idUser, $prob, $estado, $criado, $limite));
        echo "<script>alert('O processo foi criado com sucesso');</script>";  
    }    
}