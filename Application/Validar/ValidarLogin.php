<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'UserManeger.php');
require_once (Conf::getApplicationModelPath() . 'User.php');


$type = INPUT_POST;
$login = filter_input($type, 'submit');

if (isset($login)) {
    $username = filter_input($type, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $passe1 = filter_input($type, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $passe = hash("md5", $passe1);

    $FM = new UserManeger();
    $F = new User();

    $results = $FM->getUserByUsername($username);

    $list = Array();
    $r = Array();


    foreach ($results as $r) {
        $list[$r['Username']] = $F->convertArrayToObject($r);
    }

    if ($results != null && $passe1 == $r['Password']) {
        session_start();
        $_SESSION['username'] = $r['Username'];
        echo "<script>alert('Sessao Iniciada');</script>";
        //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/PAW_EpR_Grupo17/index.php">';
    } else {
        echo "<script>alert('Creedenciais não encontradas');</script>";
    }
}
