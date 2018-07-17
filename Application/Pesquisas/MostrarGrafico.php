<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');
include '../phplot-6.2.0/phplot.php';
$grafico = new PHPlot();
//SetFileFormat("png");
$grafico->SetTitle("Gráfico Estatistico");
$grafico->SetXTitle("Estado");
$grafico->SetYTitle("Quantidade");

$man =new ProcessoManeger();
$listaA= $man->getProcessoByEstado('aberto');
$listaF= $man->getProcessoByEstado('acompanhamento');
$listaE= $man->getProcessoByEstado('encerrado');
 
#Definimos os dados do gráfico
$dados = array(
        array('Encerrado', count($listaF)),
        array('Aberto', count($listaA)),
        array('Encaminhamentos', count($listaE)),
      
);
$dados2 = array(
        array('Janeiro', 10),
        array('Fevereiro', 5),
        array('Março', 4),
        array('Abril', 8),
        array('Maio', 7),
        array('Junho', 5),
            );
 
$grafico->SetDataValues($dados2);
  
#Neste caso, usariamos o gráfico em barras
$grafico->SetPlotType("bars");
 
#Exibimos o gráfico
$grafico->DrawGraph();
