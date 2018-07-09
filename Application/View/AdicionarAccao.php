<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'validarAccao.php');
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileR.css' ?>" type="text/css" rel="stylesheet">
        <title>Registar Ação</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-tranparent">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></img>
                    </div>
                    <button onclick="location.href = '<?= Conf::getApplicationViewPath() . 'index.php' ?>';" class="btn btn-danger navbar-btn">LogOut</button>
                </div>
            </nav>
        </header>
        <section>
            <h1>REGISTAR AÇÃO</h1>

            <form class="form-horizontal" action="" method="POST">

                <div class="form-check col-sm-4 ">
                    <span id="genero">Tipo de Solução:</span>
                    <label>
                        <input type="radio" id="M" name="tipo" value="Reunioes">
                        <span class="label-text">Reunioes</span>
                    </label>
                </div>

                <div class="form-check col-sm-2">
                    <label>
                        <input type="radio" id="F" name="tipo" value="Pedidos">
                        <span class="label-text">Pedidos</span>
                    </label>
                </div>
                
                <div class="form-check col-sm-2">
                    <label>
                        <input type="radio" id="F" name="tipo" value="Encaminhamentos">
                        <span class="label-text">Encaminhamentos</span>
                    </label>
                </div>
                <div id="erroSolucao"><?php isset($erros['TS']) ? print_r($erros['TS']) : NULL; ?></div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="desc">Decrição:</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" name ="descricao" placeholder="Insira a descrição" value="<?= (isset($Descricao)) ? $Descricao : ''; ?>"></textarea>
                    </div>                
                </div>
                <div id="erroDesc"><?php isset($erros['descricao']) ? print_r($erros['descricao']) : NULL; ?></div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button id="submicao" type="submit" name="enviar" class="btn btn-default">Submit</button>
                    </div>
                </div>

            </form>
        </section>

    </body>

</html>