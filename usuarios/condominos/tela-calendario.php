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

                    <!----------------------------------EDITAR E APAGAR VISUALIZAR---------------------------------------------->

                    <div class="modal-body">

                        <span id="msgViewEvento"></span>

                        <div id="visualizarEvento">
                            <dl class="row">
                                <dt class="col-sm-3">ID: </dt>
                                <dd class="col-sm-9" id="visualizar_id"></dd>
                                <dt class="col-sm-3">Título: </dt>
                                <dd class="col-sm-9" id="visualizar_title"></dd>
                                <dt class="col-sm-3">Ínicio: </dt>
                                <dd class="col-sm-9" id="visualizar_start"></dd>
                                <dt class="col-sm-3">Fim: </dt>
                                <dd class="col-sm-9" id="visualizar_end"></dd>
                            </dl>

                            <button type="button" class="btn btn-warning" id="btnViewEditEvento">Editar</button>
                            <button type="button" class="btn btn-danger" id="btnApagarEvento">Apagar</button>
                        </div>

                        <!----------------------------------FORM METHOD---------------------------------------------->


                        <div id="editarEvento" style="display: none;">

                            <span id="msgEditEvento"></span>

                            <form method="POST" id="formEditEvento">

                                <input type="hidden" name="edit_id" id="edit_id">

                                <!----------------------------------CAMPO TÍTULO---------------------------------------------->

                                <div class="row mb-3">
                                    <label for="edit_title" class="label-titulo">Título</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="edit_title" class="form-control" id="edit_title"
                                            placeholder="Título do evento">
                                    </div>
                                </div>

                                <!----------------------------------CAMPO INÍCIO---------------------------------------------->

                                <div class="row mb-3">
                                    <label for="edit_start" class="label-inicio">Início</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="edit_start" class="form-control"
                                            id="edit_start">
                                    </div>
                                </div>

                                <!----------------------------------CAMPO FIM---------------------------------------------->

                                <div class="row mb-3">
                                    <label for="edit_end" class="label-fim">Fim</label>
                                    <div class="col-sm-10">
                                        <input type="datetime-local" name="edit_end" class="form-control" id="edit_end">
                                    </div>

                                </div>

                                <!----------------------------------CAMPO COR---------------------------------------------->
                                <div class="row mb-3">
                                    <label for="edit_color" class="label-cor">Cor</label>
                                    <div class="col-sm-10">
                                        <select name="edit_color" class="form-control" id="edit_color">
                                            <option value="">Selecione</option>
                                            <option style="color:#fe0902;" value="#fe0902">Vermelho</option>
                                            <option style="color:#1104fc;" value="#1104fc">Azul</option>
                                            <option style="color:#c67591;" value="#c67591">Rosa</option>
                                            <option style="color:#337d26;" value="#337d26">Verde</option>
                                            <option style="color:#7e097e;" value="#7e097e">Roxo</option>
                                            <option style="color:#f7a837;" value="#f7a837">Laranja</option>
                                            <option style="color:#ffff00;" value="#f7a837">Amarelo</option>
                                            <option style="color:#000000;" value="#f7a837">Preto</option>
                                        </select>
                                    </div>
                                </div>

                                <!----------------------------------BOTOES CANCELAR E SALVAR---------------------------------------------->

                                <button type="button" name="btnViewEvento" class="btncancelar"
                                    id="btnViewEvento">Cancelar</button>
                                <button type="submit" name="btnEditEvento" class="btnsalvar"
                                    id="btnEditEvento">Salvar</button>

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

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            var content = document.getElementById("content");

            if (menu.style.width === "200px") {
                menu.style.width = "0";
            } else {
                menu.style.width = "200px";
            }
        }
    </script>
</body>

</html>