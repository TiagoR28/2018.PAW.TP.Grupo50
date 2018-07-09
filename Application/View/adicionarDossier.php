<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'ValidarDossier.php');
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileR.css' ?>" type="text/css" rel="stylesheet">

        <title>Adicionar Dossier</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-tranparent">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO">
                    </div>
                    <button onclick="location.href='<?= Conf::getApplicationViewPath() . 'index.php'?>';" class="btn btn-danger navbar-btn">LogOut</button>
                </div>
            </nav>
        </header>
        <section>
            <h1>ADICIONAR Dossier</h1>
            <form class="form-horizontal" action="" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nome:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nome" name ="nome" placeholder="Insira o Nome" value="<?= (isset($nome)) ? $nome : ''; ?>">
                    </div>                
                </div>
                <div id="erroNome"><?php isset($erros['nome']) ? print_r($erros['nome']) : NULL; ?></div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Bday">Data de Nascimento:</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="bday" max="<?= $now = date('y-m-d') ?>" min="1900-01-01">
                    </div>
                </div>
                <div id="erroMorada"><?php isset($erros['bday']) ? print_r($erros['bday']) : NULL; ?></div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="Contacto">Contacto Encarregado:</label>
                    <div class="col-sm-5">
                        <input type="tel" class="form-control" id="Contacto" name="Contacto" value="<?= (isset($contacto)) ? $contacto : ''; ?>">
                    </div>
                </div>
                <div id="erroMorada"><?php isset($erros['Contacto']) ? print_r($erros['Contacto']) : NULL; ?></div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button id="submicao" type="submit" name="enviar" class="btn btn-default">Submit</button>
                    </div>
                </div>

            </form>
        </section>

    </body>

</html>