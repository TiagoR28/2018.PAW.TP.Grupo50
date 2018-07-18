<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');

$type = INPUT_POST;
$estado = filter_input($type, 'estado');
$dataInicio = filter_input($type, 'dataInicio');
$dataFim = filter_input($type, 'dataFim');
$countAbs = 0;
$header = array('IdUser', 'Problema', '');


$man = new ProcessoManeger();
$Lista = $man->getProcessoByEstado($estado);

if (isset($estado) && isset($dataInicio) && isset($dataFim)) {
    
    echo '<div class="table-responsive-sm">';
            echo '<table class="table"><thead><tr>';

            foreach ($header as $head) {

                echo '<th>' . $head . '</th>';
            }
            echo '</tr></thead><tbody>';
            
    foreach ($Lista as $key => $value) {
        if ($value["Criacao"] > $dataInicio && $value["Criacao"] < $dataFim) {
            

          
                echo '<tr>';
                echo '<td>' . $value['IdUser'] . '</td>';
                echo '<td>' . $value['Problema'] . '</td>';
                echo '<td>' . '<a href=" http://localhost/DataAccessPDO/Application/View/AtualizarProcesso.php?id=' . $value['Id'] .'"><button type="button">Editar</button></a>' . '</td>';
                echo '<td>' . '<a href=" http://localhost/DataAccessPDO/Application/View/AtualizarProcesso.php?id=' . $value['Id'] .'"><button type="button">Detalhes</button></a>' . '</td>';
                echo '</tr>';
            

            
        }
    }
    echo '</tbody></table>';
            echo '</div>';
    
    foreach ($Lista as $key => $value) {
    if ($value['Problema'] == 'absentismo') {
        $countAbs++;
    }
}

$countInds = count($Lista) - $countAbs;
}


