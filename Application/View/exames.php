<?php
require_once (realpath(dirname( __FILE__ )) . '/../../Config.php');
use Config as Conf;    

require_once (Conf::getApplicationvalidarPath() . 'ValidarUtente.php');
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="../../CSS/styleProfileM.css" type="text/css" rel="stylesheet">

    <title>MedCare Exames</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-tranparent">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img class="navbar-brand" src="../../img/mRFd2kaT_400x400.png" alt="LOGO"></img>
                </div>
                <button onclick="location.href='index.html';" class="btn btn-danger navbar-btn">LogOut</button>
            </div>
        </nav>
    </header>
    <section>
        <h1>EXAMES</h1>
        <form class="form-horizontal" action="" method="GET">
            <div class="form-group">
                <label class="control-label col-sm-2" for="numberProcess">Numero do Processo:</label>
                <div class="col-sm-5">
                    <input type="int" class="form-control" id="numeroProcesso" min="1" max="999999" placeholder="123456">
                </div>
            </div>
            
<!--adicionar mais exames se necessario e alterar o nome-->
            
            <div class="form-group">
                <div class="form-check col-sm-6">
                    <span id="estado">Exames:</span>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="checkbox" id="exameX" name="tipoExame" value="exameX">
                            <span class="label-text">exameX</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="checkbox" id="exameY" name="tipoExame" value="exameY">
                            <span class="label-text">exameY</span>
                        </label>
                    </div>
                    <div class="checkbox checkbox-inline">
                        <label>
                            <input type="checkbox" id="exameZ" name="tipoExame" value="exameZ">
                            <span class="label-text">exameZ</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="obs">Observações:</label>
                <div class="col-sm-5">
                    <textarea rows="5" class="form-control" id="obs"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                    <button id="submicao" type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>

        </form>
    </section>

</body>

</html>
