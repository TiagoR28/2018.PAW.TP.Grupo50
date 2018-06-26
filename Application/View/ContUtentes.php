<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'HistoricoManeger.php');
require_once (Conf::getApplicationModelPath() . 'historico.php');
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_SESSION['username']) === TRUE) {
        $maneger = new HistoricoManeger();
        $list = $maneger->CountUtentesByDepartamento(1, 3);
        print_r(count($list));
        foreach ($list as $value) {
            ?> 
        <p>Nome Utente: <?=$value['17'] ?></p>
        <?php
        }
        } else {
            print_r('Faça Login');
        }
        
        ?>
    </body>
</html>
