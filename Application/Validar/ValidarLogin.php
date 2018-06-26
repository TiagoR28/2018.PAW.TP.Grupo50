<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php'); 
use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'FuncionarioManeger.php');
require_once (Conf::getApplicationModelPath() . 'Funcionario.php');


$type = INPUT_GET;

$username = filter_input($type, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
$passe1 = filter_input($type, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$passe = hash("md5", $passe1);

$FM = new FuncionarioManager();
$F = new Funcionario();

$results = $FM->getFuncionariosByNome($username);

$list = Array();
$r = Array();


foreach ($results as $r) {
    $list[$r['nome']] = $F->convertArrayToObject($r);
}

if ($results != null && $passe == $r['password']) {
    session_start();
    $_SESSION['username'] = $r['nome'];
    echo "<script>alert('Sessao Iniciada');</script>";
}
//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/PAW_EpR_Grupo17/index.php">';