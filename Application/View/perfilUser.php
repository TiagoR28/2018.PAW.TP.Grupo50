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
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="<?= Conf::getApplicationJavaScriptPath() . 'Listagems.js' ?>"></script>
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
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'Listagems.php' ?>">Pesquisa</a></li>  
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'AdicinarProcesso.php' ?>">Adicionar Processo</a></li>  
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
        <div>
            <p>Dados Utilizador</p>
            <p>Nome: <?= $value['Nome']?></p>
            <p>Tipo: <?= $value['Tipo']?></p>
        </div>
                <div id="alerta"></div>
                <?php
            }
        } else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/DataAccessPDO/Application/View/Index.php">';
        }
        ?>
    </body>

</html>
