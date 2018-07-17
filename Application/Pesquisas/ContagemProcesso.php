<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');

$type = INPUT_POST;
$estado = filter_input($type, 'estado');
$dataInicio = filter_input($type, 'dataInicio');
$dataFim = filter_input($type, 'dataFim');
$countAbs = 0;
$header = array('Problema', 'IdUser');


$man = new ProcessoManeger();
$Lista = $man->getProcessoByEstado($estado);


foreach ($Lista as $key => $value) {
    if ($value['Estado'] == $estado && $value["Criacao"] > $dataInicio && $value["Criacao"] < $dataFim) {
        echo '<div class="table-responsive-sm">';
        echo '<table class="table"><thead><tr>';

        foreach ($header as $head) {

            echo '<th>' . $head . '</th>';
        }
        echo '</tr></thead><tbody>';



        foreach ($Lista as $valor) {
            echo '<tr>';
            echo '<td>' . $valor['Problema'] . '</td>';
            echo '<td>' . $valor['IdUser'] . '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
        echo '</div>';
    }
}

foreach ($Lista as $key => $value) {
    if ($value['Problema'] == 'absentismo') {
        $countAbs++;
    }
}

$countInds = count($Lista) - $countAbs;