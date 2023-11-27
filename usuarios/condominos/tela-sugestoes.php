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
    <link rel="stylesheet" type="text/css" href="../../css/stylesugestoes.css">
    <link rel="stylesheet" type="text/css" href="../../css/Aresponsividademenu.css">
</head>

<body>

    <!----------------------------------TELA RECLAMAÇÕES---------------------------------------------->

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

    <!----------------------------------LOGO------------------------------------------------>

    <div id="content-wrapper">
        <img src="../../imagens/logo.png">

        <!----------------------------------TÍTULO DA RECLAMAÇÃO---------------------------------------------->
        <div id="content">
            <form action="./controles-condominos/cadastro-sugestao.php" method="post" enctype="multipart/form-data">
                <div class="input-container">
                    <label for="titulo1" class="label-cabecalho label-titulo1">Sugestões</label>
                    <label for="titulo2" class="label-sugestao label-titulo2">Título:</label>
                    <input type="text" name="titulo" class="form-input-title" required><br>



                    <!----------------------------------CAIXA DE TEXTO DESCRIÇÃO---------------------------------------------->

                    <label for="story" class="label-sugestao label-descricao">Descreva sua sugestão
                        (obrigatório):</label>
                    <textarea id="descricao" name="descricao" class="form-input-desc"></textarea><br>
                </div>


                <!----------------------------------BOTAO ENVIAR---------------------------------------------->

                <button class="custom-btn btn1" type="submit">Enviar
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor"
                                d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                            </path>
                        </svg>
                    </div>
                </button></a>
            </form>
        </div>

        <!----------------------------------CAIXA DE OBSERVAÇÃO---------------------------------------------->

        <div id="content2">
            <span class="label-observacao">Observação: todas as sugestões são apuradas, mas não necessariamente serão
                realizadas. A decisão depende exclusivamente do síndico(a). </span>
        </div>

    </div>
    <script src="../../js/menulateral.js"></script>
</body>

</html>