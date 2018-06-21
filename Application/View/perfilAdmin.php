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
    <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileA.css' ?>" type="text/css" rel="stylesheet">
    <title>MedCare Profile Admin</title>
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
                        <li class ="column-1"><a href ="./triagem.html">Adicionar Funcionario</a></li>
                        <li class ="column-1"><a href ="./registarEntrada.html">Remover Funcionario</a></li>     
                        <li class ="column-1"><a href ="./registarEntrada.html">Editar Funcionario</a></li>  
                        <li class ="column-1"><a href ="./registarEntrada.html">Adicionar Doentes</a></li>  
                        <li class ="column-1"><a href ="./registarEntrada.html">Adicionar Exames</a></li>                     
                    </ul>
                </div>        
                <button onclick="location.href='index.html';" class="btn btn-danger navbar-btn">LogOut</button>
            </div>
        </nav>
    </header>
    <div class="profile">
        <img src="<?= Conf::getApplicationImagePath() . 'avatar.png' ?>" class="logo">
        <p>Name</p>
        <p>Administrador</p>
    </div>

</body>

</html>
