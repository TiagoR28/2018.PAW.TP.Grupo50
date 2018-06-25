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
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileR.css' ?>" type="text/css" rel="stylesheet">

        <title>MedCare Adicionar Utente</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-tranparent">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO">
                    </div>
                    <button onclick="location.href = 'index.html';" class="btn btn-danger navbar-btn">LogOut</button>
                </div>
            </nav>
        </header>
        <section>
            <h1>ADICIONAR UTENTE</h1>
            <form class="form-horizontal" action="" method="GET">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nUtente">Numero de Utente:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nUtente" name ="nUtente" placeholder="Insira o numero de utente" value="<?= (isset($nome)) ? $nome : ''; ?>">
                    </div>                
                </div>
                <div id="erroNome"><?php isset($erros['nome']) ? print_r($erros['nome']) : NULL; ?></div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nome:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nome" name ="nome" placeholder="Insira o Nome" value="<?= (isset($nome)) ? $nome : ''; ?>">
                    </div>                
                </div>
                <div id="erroNome"><?php isset($erros['nome']) ? print_r($erros['nome']) : NULL; ?></div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="mensagem">Data de Nascimento:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="bday" max="<?= $now = date('y-m-d') ?>" min="1900-01-01">
                    </div>
                </div>
                <div class="form-check col-sm-4 ">
                    <span id="genero">Genero:</span>
                    <label>
                        <input type="radio" id="M" name="radio" value="M" checked="<?= ($generos == 'M') ? TRUE : FALSE ?>">
                        <span class="label-text">Masculino</span>
                    </label>
                </div>
                <div class="form-check col-sm-2">
                    <label>
                        <input type="radio" id="F" name="radio" value="F" checked="<?= ($generos == 'F') ? FALSE : TRUE ?>">
                        <span class="label-text">Feminino</span>
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Morada:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="morada" name="morada" value="<?= (isset($morada)) ? $morada : ''; ?>">
                    </div>
                </div>
                <div id="erroMorada"><?php isset($erros['morada']) ? print_r($erros['morada']) : NULL; ?></div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button id="submicao" type="submit" name="enviar" class="btn btn-default">Submit</button>
                    </div>
                </div>

            </form>
        </section>

    </body>

</html>