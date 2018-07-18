<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');
require_once (Conf::getApplicationModelPath() . 'Processo.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;

$validar = filter_input(INPUT_POST, 'enviar');
$Man = new ProcessoManeger();
$Mod = new Processo();
$id = filter_input(INPUT_GET, 'id');

if (isset($validar)) {
    $erros = array();
    $type = INPUT_POST;
    $problemas = ['absentismo', 'indisciplina'];
    $estados = ['aberto', 'acompanhamento', 'encerrado'];
    $cont = 0;
    $vetor = $Man->getProcessoByID($id);
    foreach ($vetor as $value) {
        $obj = $Mod->convertArrayToObject($value);
    }
    

    $prob = filter_input($type, 'radio', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input($type, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
    $limite = filter_input($type, 'Limite', FILTER_SANITIZE_SPECIAL_CHARS);


    if (!empty($prob)) {
        $erros['prob'] = MyValidations::validateRadio($prob, $problemas);
    } else {
        $prob = $obj->getProblema();
    }

    if (!empty($estado)) {
        $erros['estado'] = MyValidations::validateRadio($estado, $estados);
    } else {
        $estado = $obj->getEstado();
    }

    if (!empty($limite)) {
        if ($limite instanceof DateTime) {
            $erros['Limite'] = 'O campo é obrigatorio';
        }

        if ($limite < date('Y/m/d')) {
            $erros['Limite'] = 'A data deve ser maior que a data atual';
        }
    } else {
        $limite = $obj->getLimite();
    }

    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $cont++;
        }
    }
    
    if ($cont == 0) {
        $obj = $Mod->createObject($obj->getId(), $obj->getIdUser(), $prob, $estado, $obj->getCriacao(), $limite);
        $Man->updateProcesso($obj);
        echo "<script>alert('O processo foi alterado com sucesso');</script>";
    }
}