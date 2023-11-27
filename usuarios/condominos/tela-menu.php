<?php
include_once("./controles-condominos/verifica-sessao-condomino.php");
include_once('../controles-comuns/conecta-banco.php');

$stmt = $conn->prepare("SELECT CONDOMINIO.NOME AS NOME_CONDOMINIO FROM MORADORES JOIN CONDOMINIO ON MORADORES.CONDOMINIO = CONDOMINIO.idCONDOMINIO WHERE MORADORES.EMAIL = ?");
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();
$stmt->bind_result($nomeCondominio);
$stmt->fetch();
$stmt->close();

$stmt2 = $conn->prepare("SELECT TRIM(SUBSTRING_INDEX(nome, ' ', 1)) AS primeiro_nome FROM MORADORES WHERE EMAIL = ?");
$stmt2->bind_param("s", $_SESSION["email"]);
$stmt2->execute();
$stmt2->bind_result($primeiroNome);
$stmt2->fetch();
$stmt2->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/stylemenu.css">
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

    <!----------------------------------TÍTULO DO MENU---------------------------------------------->

    <div id="content-wrapper">
        <div class="content-container">
            <div id="content">
                <label for="titulo" class="label-cabecalho label-titulo">Seja bem vindo(a),
                    <?php echo $primeiroNome; ?>
                    !
                </label>
                <label for="mensagem" class="label-conteudo label-conteudo1">Condomínio:
                    <?php echo $nomeCondominio; ?>
                </label>

            </div>
            <div id="content2">

            </div>
        </div>

        <div class="content-container2">
            <div id="content3">

            </div>
            <div id="content4">

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