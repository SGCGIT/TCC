<?php
include_once("./controles-sindicos/verifica-sessao-sindico.php");
include_once('../controles-comuns/conecta-banco.php');

$stmtNome = $conn->prepare("SELECT NOME FROM MORADORES WHERE EMAIL = ?");
$stmtNome->bind_param("s", $_SESSION["email"]);
$stmtNome->execute();
$stmtNome->bind_result($nome);
$stmtNome->fetch();
$stmtNome->close();

$stmtNomeCondominio = $conn->prepare("SELECT NOME FROM CONDOMINIOS WHERE CNPJ = ?");
$stmtNomeCondominio->bind_param("s", $_SESSION["cnpj"]);
$stmtNomeCondominio->execute();
$stmtNomeCondominio->bind_result($nomeCondominio);
$stmtNomeCondominio->fetch();
$stmtNomeCondominio->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/styleperfilSINDICO.css">
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
        <a href="tela-calendario.php" class="btntelas"><img src="../../imagens/calendario.png">Calendário de
            eventos</a>
        <a href="tela-reservas.php" class="btntelas"><img src="../../imagens/reservas.png">Reservas</a>
        <a href="tela-solicitacoes.php" class="btntelas"><img src="../../imagens/solicitacoes.png">Solicitações</a>
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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-container">
                    <label for="titulo1" class="label-cabecalho label-titulo1">Perfil de usuário</label>
                    <label for="titulo2" class="label-reclamacao label-titulo2">Nome:
                         <?php echo $nome; ?>
                         </label><br>
                         <label for="titulo2" class="label-reclamacao label-titulo2">Email:
                         <?php echo $_SESSION['email']; ?>
                         </label><br>
                         <label for="titulo2" class="label-reclamacao label-titulo2">Condominio:
                         <?php echo $nomeCondominio; ?><br>
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