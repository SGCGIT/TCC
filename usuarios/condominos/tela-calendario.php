<?php
include_once("./controles-condominos/verifica-sessao-condomino.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/stylecalendarioSINDICO.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../../css/Aresponsividademenu.css">
</head>

<body>
    <!----------------------------------TELA MENU---------------------------------------------->

    <!----------------------------------CABEÇALHO---------------------------------------------->

    <div id="header">
        <button class="btnmenu" onclick="toggleMenu()">
            <img src="../../imagens/icone-menu.png" class="icone-menu botao-menu">
        </button>
        <img src="../../imagens/logo2.png" class="icone-logo">
    </div>

    <!----------------------------------MENU SUSPENSO---------------------------------------------->

    <div id="menu">
        <a href="tela-menu.php" class="btntelas"><img src="../../imagens/icone-menu2.png">Menu</a>
        <a href="tela-reclamacoes.php" class="btntelas"><img src="../../imagens/reclamacoes.png">Reclamações</a>
        <a href="tela-sugestoes.php" class="btntelas"><img src="../../imagens/sugestoes.png">Sugestões</a>
        <a href="tela-avaliacoes.php" class="btntelas"><img src="../../imagens/avaliacao.png">Avaliações</a>
        <a href="tela-calendario.php" class="btntelas"><img src="../../imagens/calendario.png">Calendário de eventos</a>
        <a href="tela-devolutiva.php" class="btntelas"><img src="../../imagens/devolutiva.png">Devolutivas</a>
        <a href="tela-reservas.php" class="btntelas"><img src="../../imagens/reservas.png">Reservas</a>
        <a href="tela-documentos.php" class="btntelas"><img src="../../imagens/documentos.png">Documentos</a>
        <a href="tela-perfil.php" class="btntelas"><img src="../../imagens/perfil.png">Perfil</a>
        <a href="tela-lista-membros.php" class="btntelas"><img src="../../imagens/membros.png">Lista de membros</a>
        <a href="tela-configuracoes.php" class="btntelas"><img src="../../imagens/configuracoes.png">Configurações e
            suporte</a>
    </div>

    <!----------------------------------TÍTULO DO CALENDÁRIO---------------------------------------------->

    <div id="content-wrapper">


        <div class="container">
            <h2 class="label-calendario">Calendário</h2>
            <span id="msg"></span>
            <div id='calendar'></div>
        </div>

        <!-----------------------------------MODAL VISUALIZAR---------------------------------------------->

        <div class="modal fade" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!----------------------------------TÍTULO VISUALIZAR---------------------------------------------->

                    <div class="modal-header">
                        <h1 class="label-visualizarevento" id="visualizarModalLabel">Visualizar o evento</h1>
                        <h1 class="label-editarevento" id="editarModalLabel" style="display: none;">Editar o evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-----------------------------------MODAL CRIAR---------------------------------------------->


        <div class="modal fade" id="criarModal" tabindex="-1" aria-labelledby="criarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src='../../js/index.global.min.js'></script>
    <script src='../../js/bootstrap5/index.global.min.js'></script>
    <script src='../../js/core/locales-all.global.min.js'></script>
    <script src='../../js/custom.js'></script>
    <script src="../../js/menulateral.js"></script>
</body>

</html>