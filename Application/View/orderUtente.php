<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ConsultaManeger.php');
require_once (Conf::getApplicationModelPath() . 'historico.php');
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
        $maneger = new ConsultaManager();
        $list = $maneger->getConsultas(FALSE);
        $inicio = '2018-06-1';
        $fim = '2018-06-30';
        
        foreach ($list as $key => $value) {
            if($value['entrada'] > $inicio && $value['saida'] < $fim) {
                ?>
        <p>Nome: <?= $value['nome']; ?></p>
        <p>Estado: <?= $value['estado']; ?></p>
        <?php
                
            }
        }
        ?>
    </body>
</html>
