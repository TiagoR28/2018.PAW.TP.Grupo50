<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');
require_once '../phplot-6.2.0/phplot.php';

$grafico = new PHPlot();
$grafico->SetFileFormat('png');

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
 
$grafico->SetDataValues($dados);
  
#Neste caso, usariamos o gráfico em barras
$grafico->SetPlotType("bars");
 
#Exibimos o gráfico
$grafico->DrawGraph();

