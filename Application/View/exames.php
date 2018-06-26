<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

require_once (Conf::getApplicationvalidarPath() . 'ValidarExames.php');
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= Conf::getApplicationBootstrapPath() . 'bootstrap.css' ?>" type="text/css" rel="stylesheet">
    <link href="<?= Conf::getApplicationCSSPath() . 'styleProfileM.css' ?>" type="text/css" rel="stylesheet">

    <title>MedCare Exames</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-tranparent">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></img>
                </div>
                <button onclick="location.href='<?= Conf::getApplicationViewPath() . 'index.php'?>';" class="btn btn-danger navbar-btn">LogOut</button>
            </div>
        </nav>
    </header>
    <section>
        <h1>EXAMES</h1>
        <form class="form-horizontal" action="" method="GET">
            <div class="form-group">
                <label class="control-label col-sm-2" for="numberProcess">Numero do Processo:</label>
                <div class="col-sm-5">
                    <input type="int" class="form-control" id="numeroProcesso" min="1" max="999999" placeholder="123456" name="id">
                </div>
            </div>
            
<!--adicionar mais exames se necessario e alterar o nome-->
            
            <div class="form-group">
                <div class="form-check col-sm-6">
                    <span id="estado">Exames:</span>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="radio" id="exameX" name="tipoExame" value="cardio">
                            <span class="label-text">cardio</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="radio" id="exameY" name="tipoExame" value="gerais">
                            <span class="label-text">gerais</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="radio" id="exameZ" name="tipoExame" value="respiratorios">
                            <span class="label-text">respiratorios</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="obs">Observações:</label>
                <div class="col-sm-5">
                    <textarea rows="5" class="form-control" id="obs" name="obs"></textarea>
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
