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
    <title>MedCare Profile Recepcionist</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-tranparent">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></img>
                </div>
                <div class ="nav">
                    <ul>
                        <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'adicionarUtente.php'?>">Adicionar Utente</a></li>
                        <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'registarEntrada.php'?>">Registar Entrada</a></li>                        
                    </ul>
                </div>
        
                <button onclick="location.href='<?= Conf::getApplicationViewPath() . 'index.php'?>';" class="btn btn-danger navbar-btn">LogOut</button>
                
            </div>
        </nav>
    </header>
    <div class="profile">
        <img src="<?= Conf::getApplicationImagePath() . 'avatar.png' ?>" class="logo">
        <p>Username</p>
        <p>Tipo de Funcionario</p>
    </div>

</body>

</html>