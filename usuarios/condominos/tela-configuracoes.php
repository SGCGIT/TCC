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
    <link rel="stylesheet" type="text/css" href="../../css/styleconfiguracoes.css">
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

    <!-----------------------------------CONTENT 1---------------------------------------------->

    <div id="content-wrapper">
        <div class="content-container">
            <div id="content">

                <!----------------------------------CONTEÚDO DA CONTENT---------------------------------------------->
                <div id="content-text1">
                    <label for="titulo2" class="label-sair label-titulo1">Precisa de ajuda? Aqui é o lugar!</label>
                </div>
                <div id="content-text2">
                    <label for="titulo2" class="label-membros label-email">Entre em contato via email:</label>
                    <label for="titulo2" class="label-membros label-instagram">Entre em contato via nosso
                        instagram:</label>
                </div>

                <!----------------------------------BOTÕES DE CONTATO---------------------------------------------->

                <div id="content-button">

                    <div class="uiverse"
                        onclick="window.location.href='https://mail.google.com/mail/?view=cm&fs=1&to=sgcoficialcontato@gmail.com&su=Assunto&body';">
                        <span class="tooltip" href="">sgcoficialcontato@gmail.com</span>
                        <span>Email</span>
                    </div>

                    <div class="uiverse1" onclick="window.location.href='https://www.instagram.com/sgcoficial/';">
                        <span class="tooltip">@sgcoficial</span>
                        <span>Instagram</span>
                    </div>



                </div>
            </div>

            <!-----------------------------------CONTENT 2---------------------------------------------->

            <div class="content-container2">
                <div id="content2">

                    <!-----------------------------------TÍTULO DA CONTENT---------------------------------------------->

                    <label for="titulo2" class="label-sair label-titulo1">Deseja sair da conta?</label>

                    <!-----------------------------------BOTÃO SAIR---------------------------------------------->

                    <div class="buttons-container">

                        <form action="../controles-comuns/sair.php">
                            <button class="custom-btn btn1" type="submit" id="btnvoltar">Sair
                        </form>

                        <div class="icon iconvoltar">
                            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                viewBox="0 0 1024 1024">
                                <path
                                    d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                                </path>
                            </svg>
                        </div>
                        </button>
                    </div>
                </div>

                <!-----------------------------------CONTENT 3---------------------------------------------->

                <div id="content3">
                    <label for="titulo2" class="label-membros label-titulo3">Quer saber mais sobre os
                        desenvolvedores?</label>

                    <label for="titulo2" class="label-membros label-beacons">Acesse nosso Beacons:</label>

                    <div class="uiverse2" onclick="window.location.href='https://beacons.ai/sgcoficial';">
                        <span class="tooltip">@sgcoficial</span>
                        <span>Beacons</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
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