<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

session_start();
require_once (Conf::getApplicationvalidarPath() . 'EditarProcesso.php');
?>
<!DOCTYPE html>
<html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
        <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileM.css' ?>" type="text/css" rel="stylesheet">

        <title>Atualizar Processo</title>
    </head>
    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <body>
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
                <h1>Atualizar Processo</h1>
                <form class="form-horizontal" action="" method="POST">

                    <div class="form-group">
                        <div class="form-check col-sm-6  ">
                            <span id="exames">Problema:</span>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="radio" value="absentismo">
                                    <span class="label-text">absentismo</span>
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="radio" value="indisciplina">
                                    <span class="label-text">indisciplina</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="erroProblema"><?php isset($erros['prob']) ? print_r($erros['prob']) : NULL; ?></div>
                    
                    <div class="form-group">
                        <div class="form-check col-sm-6  ">
                            <span id="exames">Estado:</span>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="status" value="acompanhamento">
                                    <span class="label-text">Acompanhamento</span>
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="status" value="aberto">
                                    <span class="label-text">Aberto</span>
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="status" value="encerrado">
                                    <span class="label-text">Encerrado</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="erroProblema"><?php isset($erros['prob']) ? print_r($erros['prob']) : NULL; ?></div>
                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="Limite">Data de Limite:</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="Limite" max="<?= $now = date_default_timezone_set('Europe/Lisbon') ?>" min="1900-01-01">
                        </div>
                    </div>
                    <div id="erroLimite"><?php isset($erros['Limite']) ? print_r($erros['Limite']) : NULL; ?></div>

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
