<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');

$type = INPUT_POST;
$header = array('IdUser', 'Problema', 'Limite', '', '');


$man = new ProcessoManeger();
$Lista = $man->getProcesso();

$now = date('Y/m/d');

    
    echo '<div class="table-responsive-sm">';
            echo '<table class="table"><thead><tr>';

            foreach ($header as $head) {

                echo '<th>' . $head . '</th>';
            }
            echo '</tr></thead><tbody>';
            
    foreach ($Lista as $key => $value) {
        if ($value["Limite"] < $now && $value["Estado"] != 'encerrado') {
                echo '<tr>';
                echo '<td>' . $value['IdUser'] . '</td>';
                echo '<td>' . $value['Problema'] . '</td>';
                echo '<td>' . $value['Limite'] . '</td>';
                echo '<td>' . '<a href=" http://localhost/DataAccessPDO/Application/View/AtualizarProcesso.php?id=' . $value['IdPro'] .'"><button type="button">Editar</button></a>' . '</td>';
                echo '<td>' . '<a href=" http://localhost/DataAccessPDO/Application/View/Historico.php?id=' . $value['IdPro'] .'"><button type="button">Detalhes</button></a>' . '</td>';
                echo '</tr>';
        }
    }
    echo '</tbody></table>';
            echo '</div>';
    
