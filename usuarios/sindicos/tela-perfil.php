<?php
include_once("./controles-sindicos/verifica-sessao-sindico.php");
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

$stmt3 = $conn->prepare("SELECT EMAIL FROM MORADORES WHERE EMAIL = ?");
$stmt3->bind_param("s", $_SESSION["email"]);
$stmt3->execute();
$stmt3->bind_result($email);
$stmt3->fetch();
$stmt3->close();

$stmt4 = $conn->prepare("SELECT CONDOMINIO.IMAGEM AS IMAGEM_CONDOMINIO FROM MORADORES JOIN CONDOMINIO ON MORADORES.CONDOMINIO = CONDOMINIO.idCONDOMINIO WHERE MORADORES.EMAIL = ?");
$stmt4->bind_param("s", $_SESSION["email"]);
$stmt4->execute();
$stmt4->bind_result($imagem);
$stmt4->fetch();
$stmt4->close();

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
                    <label for="titulo2" class="label-reclamacao label-titulo2">Informações:</label>
                    <label for="titulo2" class="label-reclamacao label-titulo2">nome:
                         <?php echo $primeiroNome; ?>
                         </label><br>
                         <label for="titulo2" class="label-reclamacao label-titulo2">emai:
                         <?php echo $email; ?>
                         </label><br>
                         <label for="titulo2" class="label-reclamacao label-titulo2">condominio:
                         <?php echo $nomeCondominio; ?><br>
                         <?php
                         if (!empty('IMAGEM')) {
                         $largura = 150;  
                         $altura = 150;
                         echo "<li>Imagem: <img src='" . htmlspecialchars('IMAGEM') . "' width='" . $largura . "' height='" . $altura .  "' alt=''></li>";
                         } else {
                             echo 'Imagem não encontrada!';
                         }
                         ?>
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