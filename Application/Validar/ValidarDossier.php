<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'DossierManeger.php');
require_once (Conf::getApplicationModelPath() . 'Dossier.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;

$validar = filter_input(INPUT_POST, 'enviar');

if (isset($validar)) {

    $erros = array();
    $type = INPUT_POST;
    $count = 0;

    $nome = filter_input($type, 'nome', FILTER_SANITIZE_MAGIC_QUOTES);
    $contacto = filter_input($type, 'Contacto', FILTER_SANITIZE_STRING);
    $data = filter_input($type, 'bday', FILTER_SANITIZE_SPECIAL_CHARS);

    $erros['nome'] = MyValidations::validateString($nome, 3, 50);
    $erros['Contacto'] = MyValidations::validateInteger($contacto, 9);
    $erros['bday'] = MyValidations::validateDate($data);

    foreach ($erros as $key => $value) {
        if (!empty($value)) {
            $count++;
        }
    }
    
    if ($count == 0) {
        $Man = new DossierManeger();
        $Mod = new Dossier();
        $Man->createDossier($Mod->createObject(Null, $nome, $data, $contacto));
        echo "<script>alert('O dossier foi criado com sucesso');</script>";  
    }
}