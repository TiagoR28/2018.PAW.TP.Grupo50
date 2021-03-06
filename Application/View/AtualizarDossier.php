<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'EditarDossier.php');
require_once (Conf::getApplicationvalidarPath() . 'ValidarLogin.php');
session_start();
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileR.css' ?>" type="text/css" rel="stylesheet">
        <title>Atualizar Dossier</title>
    </head>

    <body>
        <?php
        if (isset($_SESSION['username'])) {
            ?>
            <header>
                <nav class="navbar navbar-tranparent">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="<?= Conf::getApplicationViewPath() . 'perfilUser.php' ?>"><img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . '37279481_10204770496458106_1157461924988846080_n.png' ?>" alt="LOGO"></a>
                        </div>
                        <button onclick="location.href = '<?= Conf::getApplicationViewPath() . 'index.php' ?>';" class="btn btn-danger navbar-btn">LogOut</button>
                    </div>
                </nav>
            </header>
            <section>
                <h1>Atualizar Dossier</h1>
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
                            <input type="date" class="form-control" name="bday" max="<?= $now = date('Y/m/d'); ?>" min="1900-01-01">
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
            <?php
        } else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/DataAccessPDO/Application/View/Index.php">';
        }
        ?>
    </body>

</html>