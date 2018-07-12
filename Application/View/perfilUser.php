<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'ValidarLogin.php');
require_once (Conf::getApplicationManagerPath() . 'UserManeger.php');
session_start();
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileA.css' ?>" type="text/css" rel="stylesheet">
        <title>Profile Utilizador</title>
    </head>

    <body>
        <?php
        if (isset($_SESSION['username'])) {
            $UM = new UserManeger();
            $vetor = $UM->getUserByUsername($_SESSION['username']);
            foreach ($vetor as $value) {
                ?>
                <header>
                    <nav class="navbar navbar-tranparent">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></img>
                            </div>
                            <div class ="nav">
                                <ul>
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'adicionarDossier.php' ?>">Adicionar Dossier</a></li>
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'registarEntrada.php' ?>">Listagem</a></li>     
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'registarEntrada.php' ?>">Editar Meus Dados</a></li>  
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'registarEntrada.php' ?>">Adicionar Processo</a></li>  
                                    <?php 
                                    if ($value['Tipo'] == 'administrador') {
                                    ?>
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'adicionarUser.php' ?>">Adicionar Utilizador</a></li>
                                    
                                    <?php 
                                    }
                                    ?>
                                </ul>
                            </div>        
                            <button onclick="location.href = '<?= Conf::getApplicationViewPath() . 'index.php' ?>';" class="btn btn-danger navbar-btn">LogOut</button>
                        </div>
                    </nav>
                </header>        
                <div class="profile">
                    <img src="<?= Conf::getApplicationImagePath() . 'avatar.png' ?>" class="logo">
                    <p>UserName: <?= print_r($value['Username']); ?></p>
                    <p>Nome: <?= print_r($value['Nome']); ?></p>
                    <p>Tipo de Utilizador: <?= print_r($value['Tipo']); ?></p>
                </div>
                <?php
            }
        } else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/DataAccessPDO/Application/View/Index.php">';
        }
        ?>
    </body>

</html>
