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
        $list = $maneger->filtrarUtentesByDepartamento('2018-06-13 00:00:00', 3);
        
        print_r(count($list));
        } else {
            print_r('Faça Login');
        }
        ?>
    </body>
</html>
