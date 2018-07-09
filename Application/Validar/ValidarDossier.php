<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'UtenteManeger.php');
require_once (Conf::getApplicationModelPath() . 'Utente.php');
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
//        $UM = new UtenteManager();
//        $U = new Utente();
//        $UM->createUtente($U->createObject($id, $nome, $data, $genero, $morada));
        echo 'O dossier foi criado com sucesso';    // TODO: Apagar esta linha ou mudar para alert 
    }
}