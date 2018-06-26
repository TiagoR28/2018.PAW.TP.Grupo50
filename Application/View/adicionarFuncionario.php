<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'ValidarFuncionario.php');
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileR.css' ?>" type="text/css" rel="stylesheet">
        
        <title>MedCare Adicionar Funcionario</title>
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
            <h1>ADICIONAR FUNCIONARIO</h1>
            <form class="form-horizontal" action="" method="GET">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Nome:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nome" name ="nome" placeholder="Insira o Nome" value="<?= isset($nome) ? print_r($nome) : NULL ?>">
                    </div>                
                </div>
                <div id="erroNome"><?php isset($erros['nome']) ? print_r($erros['nome']) : NULL; ?></div>
                
                <div class="form-check col-sm-4 ">
                    <span id="genero">Tipo de Funcionario:</span>
                    <label>
                        <input type="radio" id="M" name="tipo" value="Medico">
                        <span class="label-text">Medico</span>
                    </label>
                </div>
                
                <div class="form-check col-sm-2">
                    <label>
                        <input type="radio" id="F" name="tipo" value="Recepcao">
                        <span class="label-text">Recepção</span>
                    </label>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="Password">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="pass">
                    </div>
                </div>
                <div id="erroNome"><?php isset($erros['pass']) ? print_r($erros['pass']) : NULL; ?></div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="comfirmar">Password:</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" name="comfPass">
                    </div>
                </div>
                <div id="erroNome"><?php isset($erros['comf']) ? print_r($erros['comf']) : NULL; ?></div>
                
                <div class="form-check col-sm-4 ">
                    <span id="genero">Genero:</span>
                    <label>
                        <input type="radio" id="M" name="radio" value="M">
                        <span class="label-text">Masculino</span>
                    </label>
                </div>
                <div class="form-check col-sm-2">
                    <label>
                        <input type="radio" id="F" name="radio" value="F">
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
