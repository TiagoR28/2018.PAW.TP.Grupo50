<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'FuncionarioManeger.php');
require_once (Conf::getApplicationModelPath() . 'User.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;

$validar = filter_input(INPUT_GET, 'enviar');

if (isset($validar)) {

    $erros = array();
    $tiposF = ['assistente', 'administrador'];
    $type = INPUT_POST;
    $count = 0;
    
    $username = filter_input($type, 'username', FILTER_SANITIZE_MAGIC_QUOTES);
    $nome = filter_input($type, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);    
    $pass = filter_input($type, 'pass', FILTER_SANITIZE_MAGIC_QUOTES);
    $pass2 = filter_input($type, 'comfPass', FILTER_SANITIZE_MAGIC_QUOTES);
    $tipo = filter_input($type, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $erros['TU'] = MyValidations::validateRadio($tipo, $tiposF);
    $erros['nome'] = MyValidations::validateString($nome, 3, 50);
    $erros['username'] = MyValidations::validateString($username, 5, 20);
    $erros['pass'] = MyValidations::validateString($pass, 3, 20);
    $erros['comfPass'] = MyValidations::validateString($pass, 3, 20);
    
    
    if ($pass != $pass2) {
        $erros['pass'] = 'As passwords não coincidem';
    }
    
    foreach ($erros as $key => $value) {
         if (!empty($value)) {
             $count++;
         }
    } 

    if ($count == 0) {        
//        $maneger = new FuncionarioManager();
//        $model = new Users();
//        $maneger->createFuncionario($model->createObject(NULL, $nome, $tipo, md5($pass), $genero, $morada));
        echo 'User Criado com sucesso';
    }
}