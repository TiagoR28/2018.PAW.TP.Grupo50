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
        
        <title>MedCare Editar Funcionario</title>
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
            <h1>EDITAR FUNCIONARIO</h1>
            <form class="form-horizontal" action="" method="GET">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nome:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nome" name ="nome" placeholder="Insira o Nome" value="">
                    </div>                
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Tipo de Funcionario:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="tipoFuncionario" name="tipoFuncionario" placeholder="Medico, Recepcao" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button id="submicao" type="submit" name="enviar" class="btn btn-default">Submit</button>
                    </div>
                </div>

            </form>
        </section>

    </body>

</html>
