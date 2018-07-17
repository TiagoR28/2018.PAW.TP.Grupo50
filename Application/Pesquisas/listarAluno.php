<?php

require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'DossierManeger.php');

$man = new DossierManeger();
$nome = filter_input(INPUT_POST, 'aluno');
$header = array('Nome', 'Solução', 'Data');
$headerDossier = array('Nome', 'Data Nascimento', 'Contacto Encarregado');

if (isset($nome) == TRUE) {
    $resul = $man->getListAlunos($nome);

    echo '<div class="table-responsive-sm">';
    echo '<table class="table"><thead><tr>';

    foreach ($header as $head) {

        echo '<th>' . $head . '</th>';
    }
    echo '</tr></thead><tbody>';



    foreach ($resul as $valor) {
        echo '<tr>';
        echo '<td>' . $valor['Nome'] . '</td>';
        echo '<td>' . $valor['Solucao'] . '</td>';
        echo '<td>' . $valor['Data'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    echo '</div>';
} 

if ($nome == '') {
    $resul = $man->getDossier();

    echo '<div class="table-responsive-sm">';
    echo '<table class="table"><thead><tr>';

    foreach ($headerDossier as $head) {

        echo '<th>' . $head . '</th>';
    }
    echo '</tr></thead><tbody>';

    foreach ($resul as $valor) {
        echo '<tr>';
        echo '<td>' . $valor['Nome'] . '</td>';
        echo '<td>' . $valor['Nascimento'] . '</td>';
        echo '<td>' . $valor['ContatoEnc'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody></table>';
    echo '</div>';
}