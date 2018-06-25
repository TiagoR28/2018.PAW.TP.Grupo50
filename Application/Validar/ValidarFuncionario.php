<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'FuncionarioManeger.php');
require_once (Conf::getApplicationModelPath() . 'Funcionario.php');
require_once (Conf::getApplicationUtilsPath() . 'Validations.php');

use Validations as MyValidations;

$validar = filter_input(INPUT_GET, 'enviar');

if (isset($validar)) {

    $erros = array();
    $generos = ['M', 'F'];
    $tiposF = ['Recepcao', 'Medico', 'Admin'];
    $type = INPUT_GET;
    $count = 0;
    
    $nome = filter_input($type, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $morada = filter_input($type, 'morada', FILTER_SANITIZE_STRING);
    $pass = filter_input($type, 'pass', FILTER_SANITIZE_MAGIC_QUOTES);
    $pass2 = filter_input($type, 'comfPass', FILTER_SANITIZE_MAGIC_QUOTES);
    $genero = filter_input($type, 'radio', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo = filter_input($type, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
    
    $erros['TF'] = MyValidations::validateRadio($tipo, $tiposF);
    $erros['nome'] = MyValidations::validateString($nome, 3, 50);
    $erros['morada'] = MyValidations::validateString($morada, 3, 50);
    $erros['pass'] = MyValidations::validateString($pass, 3, 20);
    $erros['genero'] = MyValidations::validateRadio($genero, $generos);
    
    if ($pass != $pass2) {
        $erros['comf'] = 'As passwords não coincidem';
    }
    
    foreach ($erros as $key => $value) {
         if (!empty($value)) {
             $count++;
         }
    } 
    print_r($erros);
    if ($count == 0) {
        $maneger = new FuncionarioManager();
        $model = new Funcionario();
        $maneger->createFuncionario($model->createObject(NULL, $nome, $tipo, md5($pass), $genero, $morada));
    }
}