<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

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
        <script src="<?= Conf::getApplicationJavaScriptPath() . 'Listagems.js' ?>"></script>
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
                                <a href="<?= Conf::getApplicationViewPath() . 'perfilUser.php' ?>"><img class="navbar-brand" src="<?= Conf::getApplicationImagePath() . '37279481_10204770496458106_1157461924988846080_n.png' ?>" alt="LOGO"></a>
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
                    <div id="formContagem">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="inicio">Data de inicio:</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" id="inicio" >
                                </div>                
                            </div>                    

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="fim">Data de fim:</label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" id="fim">
                                </div>
                            </div>                    
                            Estado do processo:
                            <select id="status">
                                <option value="" selected="" ></option>
                                <option value="aberto">Aberto</option>
                                <option value="acompanhamento">Acompanhamento</option>
                                <option value="encerrado">Encerrado</option>
                            </select>
                        </form>
                        <button class="btn btn-default" id="Filtar">Procurar</button>
                    </div>
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
