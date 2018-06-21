<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileM.css' ?>" type="text/css" rel="stylesheet">

        <title>MedCare Processos em Espera</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-tranparent">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></img>
                    </div>
                    <button onclick="location.href = 'index.html';" class="btn btn-danger navbar-btn">LogOut</button>
                </div>
            </nav>
        </header>
        <section>
            <h1>PROCESSOS EM ESPERA</h1>
            <div class="container" id="conteiner">
                <div class="row" id="titulos">
                    <div class="col-sm-3" >Processos em Espera</div>
                    <div class="col-sm-3" >Estado</div>
                    <div class="col-sm-3" >Limite de Espera</div>
                    <div class="col-sm-2">Ação</div>
                </div>
                <div class="row">
                    <div class="col-sm-3" id="coluna">Numero Do Processo</div>
                    <div class="col-sm-3" id="coluna">Vermelho</div>
                    <div class="col-sm-3" id="coluna">13h20</div>
                    <div class="col-sm-2">
                        <button id="atender" type="submit" class="btn btn-default">Atender</button>
                        <button id="tranferir" type="submit" class="btn btn-default">Tranferir</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3" id="coluna">Numero Do Processo</div>
                    <div class="col-sm-3" id="coluna">Amarelo</div>
                    <div class="col-sm-3" id="coluna">13h20</div>
                    <div class="col-sm-2">
                        <button id="atender" type="submit" class="btn btn-default">Atender</button>
                        <button id="tranferir" type="submit" class="btn btn-default">Tranferir</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3" id="coluna">Numero Do Processo</div>
                    <div class="col-sm-3" id="coluna">Verde</div>
                    <div class="col-sm-3" id="coluna">13h28</div>
                    <div class="col-sm-2">
                        <button id="atender" type="submit" class="btn btn-default">Atender</button>
                        <button id="tranferir" type="submit" class="btn btn-default">Tranferir</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3" id="coluna">Numero Do Processo</div>
                    <div class="col-sm-3" id="coluna">Vermelho</div>
                    <div class="col-sm-3" id="coluna">13h35</div>
                    <div class="col-sm-2">
                        <button id="atender" type="submit" class="btn btn-default">Atender</button>
                        <button id="tranferir" type="submit" class="btn btn-default">Tranferir</button>
                    </div>
                </div>
            </div>

        </section>

    </body>

</html>
