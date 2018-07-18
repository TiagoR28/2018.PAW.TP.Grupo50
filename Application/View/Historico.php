<?php
require_once (realpath(dirname(__FILE__)) . '/../../Config.php');

use Config as Conf;

require_once (Conf::getApplicationvalidarPath() . 'ValidarLogin.php');
require_once (Conf::getApplicationManagerPath() . 'ProcessoManeger.php');
require_once (Conf::getApplicationManagerPath() . 'AcccoesManeger.php');
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
            $PM = new ProcessoManeger();
            $AM = new AcccoesManeger();
            $id = filter_input(INPUT_GET, 'id');
            $accoes = $AM->getAccoesByIDProc($id);
            if (count($accoes) > 0) {
            $vetor = $PM->getHistoricoAccoesByID($id);
            } else {
                $vetor = $PM->getHistoricoByID($id);
            }
            
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
                                    <li class ="column-1"><a href ="<?= Conf::getApplicationViewPath() . 'AdicionarAccao.php?idDoss=' . $value['IdDossier']  . ' & idPro=' . $id ?>">Adicionar Acção</a></li>
                                </ul>
                            </div>        
                            <button onclick="location.href = '<?= Conf::getApplicationViewPath() . 'index.php' ?>';" class="btn btn-danger navbar-btn">LogOut</button>
                        </div>
                    </nav>
                </header>    

                <div>
                    <section id="Problema">
                        <p>Dados do processo</p>
                        <p>Tipo de Problema: <?= $value['Problema'] ?></p>
                        <p>Estado do processo: <?= $value['Estado'] ?></p>
                        <p>Data Limite de resulução: <?= $value['Limite'] ?></p>  
                        <p>Responsavel pelo processo: <?= $value['Nome'] ?></p>
                    </section>
                    <?php
                   if (count($accoes) > 0) {
                    ?>
                    <section id="Dossier">
                        <p>Dados do dossente</p>
                        <p>Nome: <?= $value['Problema'] ?></p>
                        <p>Data de Nascomento: <?= $value['Nascimento'] ?></p>
                        <p>Contacto do Encarregado: <?= $value['ContatoEnc'] ?></p>
                    </section>

                    <?php
                   }
                }
                foreach ($accoes as $accao) {
                    ?>
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="black">Solucao</th>
                                    <th>Data</th>
                                    <th>Descricao</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $value['Solucao'] ?></td>
                                    <td><?= $value['Data'] ?></td>
                                    <td><?= $value['Descricao'] ?></td>
                                </tr>                                    
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
        } else {
            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=http://localhost/DataAccessPDO/Application/View/Index.php">';
        }
        ?>
    </body>
</html>
