<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'ValidarUtente.php');
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
    <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileM.css' ?>" type="text/css" rel="stylesheet">

    <title>MedCare Triagem</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-tranparent">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></img>
                </div>
                <button onclick="location.href='index.html';" class="btn btn-danger navbar-btn">LogOut</button>
            </div>
        </nav>
    </header>
    <section>
        <h1>TRIAGEM</h1>
        <form class="form-horizontal" action="" method="GET">
            <div class="form-group">
                <label class="control-label col-sm-2" for="numberProcess">Numero do Processo:</label>
                <div class="col-sm-5">
                    <input type="int" class="form-control" id="numeroProcesso" min="1" max="999999" placeholder="123456">
                </div>
            </div>

            <div class="form-group">
                <div class="form-check col-sm-6  ">
                    <span id="estado">Estado:</span>
                    <div class="radio radio-inline">
                        <label>
                            <input type="radio" id="verde" name="estado" value="verde">
                            <span class="label-text">Verde</span>
                        </label>
                    </div>
                    <div class="radio radio-inline">
                        <label>
                            <input type="radio" id="amarelo" name="estado" value="amarelo">
                            <span class="label-text">Amarelo</span>
                        </label>
                    </div>
                    <div class="radio radio-inline">
                        <label>
                            <input type="radio" id="vermelho" name="estado" value="vermelho">
                            <span class="label-text">Vermelho</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check col-sm-6  ">
                    <span id="exames">Exames:</span>
                    <button id="exExames" type="submit" class="btn btn-default">Fazer Exames</button>
                    <div class="radio radio-inline">
                        <label>
                            <input type="radio" id="jaTem" name="exames" value="jaTem">
                            <span class="label-text">Ja Tem</span>
                        </label>
                    </div>
                    <div class="radio radio-inline">
                        <label>
                            <input type="radio" id="nao" name="exames" value="nao">
                            <span class="label-text">Não</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="obs">Observações:</label>
                <div class="col-sm-5">
                    <textarea rows="5" class="form-control" id="obs"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <button id="submicao" type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>

        </form>
    </section>

</body>

</html>