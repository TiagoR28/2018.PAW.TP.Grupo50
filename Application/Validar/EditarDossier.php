<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'DossierManeger.php');
require_once (Conf::getApplicationModelPath() . 'Dossier.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;

$Man = new DossierManeger();
$Mod = new Dossier();
$validar = filter_input(INPUT_POST, 'enviar');



if (isset($validar)) {

    $erros = array();
    $type = INPUT_POST;
    $count = 0;

    $id = filter_input(INPUT_GET, 'id');
    $nome = filter_input($type, 'nome', FILTER_SANITIZE_MAGIC_QUOTES);
    $contacto = filter_input($type, 'Contacto', FILTER_SANITIZE_STRING);
    $data = filter_input($type, 'bday', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $obj = $Man->getDossierByID($id);

    if (isset($nome)) {
        $erros['nome'] = MyValidations::validateString($nome, 3, 50);
    } else {
        $nome = $obj['Nome'];
    }

    if (isset($contacto)) {
        $erros['Contacto'] = MyValidations::validateInteger($contacto, 9);
    } else {
        $contacto = $obj['ContatoEnc'];
    }
    
    if (isset($data)) {
         $erros['bday'] = MyValidations::validateDate($data);
    } else {
        $data = $obj['Nascimento'];
    }

    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $count++;
        }
    }

    if ($count == 0) {

        $Man->updateDossier($Mod->createObject($id, $nome, $data, $contacto));
        echo "<script>alert('O dossier foi alterado com sucesso');</script>";
    }
}