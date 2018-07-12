<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'ValidarUser.php');
session_start();
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileR.css' ?>" type="text/css" rel="stylesheet">

        <title>Adicionar Utilizador</title>
    </head>
    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <body>
            <header>
                <nav class="navbar navbar-tranparent">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="<?= Conf::getApplicationViewPath() . 'perfilUser.php' ?>"><img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></a>
                        </div>
                        <button onclick="location.href = '<?= Conf::getApplicationViewPath() . 'index.php' ?>';" class="btn btn-danger navbar-btn">LogOut</button>
                    </div>
                </nav>
            </header>
            <section>
                <h1>ADICIONAR Utilizador</h1>
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Username:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="nome" name ="username" placeholder="Insira o username" value="<?= isset($username) ? print_r($username) : NULL ?>">
                        </div>                
                    </div>
                    <div id="erroNome"><?php isset($erros['username']) ? print_r($erros['username']) : NULL; ?></div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Password">Password:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pass">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Password">Comfirmar Password:</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="comfPass">
                        </div>
                    </div>

                    <div id="erroNome"><?php isset($erros['pass']) ? print_r($erros['pass']) : NULL; ?></div>

                    <div class="form-check col-sm-4 ">
                        <span id="genero">Tipo de Utilizador:</span>
                        <label>
                            <input type="radio" id="M" name="tipo" value="assistente">
                            <span class="label-text">Assistente</span>
                        </label>
                    </div>

                    <div class="form-check col-sm-2">
                        <label>
                            <input type="radio" id="F" name="tipo" value="administrador">
                            <span class="label-text">Administrador</span>
                        </label>
                    </div>
                    <div id="erroMorada"><?php isset($erros['TU']) ? print_r($erros['TU']) : NULL; ?></div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Nome:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="Nome" name="nome" value="<?= (isset($nome)) ? $nome : ''; ?>">
                        </div>
                    </div>
                    <div id="erroMorada"><?php isset($erros['nome']) ? print_r($erros['nome']) : NULL; ?></div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
                            <button id="submicao" type="submit" name="enviar" class="btn btn-default">Submit</button>
                        </div>
                    </div>

                </form>
            </section>

        </body>
        <?php
    } else {
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/DataAccessPDO/Application/View/Index.php">';
    }
    ?>
</html>
