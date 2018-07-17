<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

//require_once (Conf::getApplicationvalidarPath() . 'ValidarDossier.php');
require_once (Conf::getApplicationvalidarPath() . 'ValidarLogin.php');
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
        <script src="<?= Conf::getApplicationJavaScriptPath() . 'Listagem.js' ?>"></script>
        <title>Pesquisa</title>
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
                                <a href="<?= Conf::getApplicationViewPath() . 'perfilUser.php' ?>"><img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . 'mRFd2kaT_400x400.png' ?>" alt="LOGO"></a>
                            </div>
                            <div class ="nav">
                                <ul>
                                    <li class ="column-1"><button id="CP">Contagem de processos</button></li>
                                    <li class ="column-1"><button id="FA">Filtar processos por aluno</button></li>     
                                    <li class ="column-1"><button id="MG">Mostrar graficos</button></li>  
                                </ul>
                            </div>        
                            <button onclick="location.href = '<?= Conf::getApplicationViewPath() . 'index.php' ?>';" class="btn btn-danger navbar-btn">LogOut</button>
                        </div>
                    </nav>
                </header>        
                <div id="input">
                    <form class="form-horizontal" id="formContagem">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="inicio">Data de inicio:</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name ="inicio" >
                            </div>                
                        </div>                    

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="fim">Data de fim:</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" name="fim">
                            </div>
                        </div>                    

                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Contacto">Estado do processo:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="estado">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <button type="submit" id="contagem" class="btn btn-default">Procurar</button>
                            </div>
                        </div>
                    </form>
                    
                    <form class="form-horizontal" action="" method="POST" id="aluno" >                           
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Contacto">Nome do aluno:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="nome">
                            </div>
                        </div>
                    </form>
                    
                </div>
        <div id="output">
            <div id="resulCP"></div>
            <div id="resulFA"></div>
            <div id="resulMG"></div>
        </div>
                <?php
            }
        } else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/DataAccessPDO/Application/View/Index.php">';
        }
        ?>
    </body>
</html>
