<?php
include_once("./controles-condominos/verifica-sessao-condomino.php");
include_once('../controles-comuns/conecta-banco.php');

$stmt = $conn->prepare("SELECT CNPJ_CONDOMINIO FROM MORADORES WHERE EMAIL = ?");
$stmt->bind_param("s", $_SESSION["email"]);
$stmt->execute();
$stmt->bind_result($_SESSION['cnpj']);
$stmt->fetch();
$stmt->close();

$stmt = $conn->prepare("SELECT NOME FROM CONDOMINIOS WHERE CNPJ = ?");
$stmt->bind_param("s", $_SESSION["cnpj"]);
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

    <!----------------------------------TÍTULO DO MENU---------------------------------------------->

    <div id="content-wrapper">
        <div class="content-container">
            <div id="content">
                <label for="titulo" class="label-cabecalho label-titulo">Seja bem vindo(a),
                    <?php echo $primeiroNome;?>!
                </label>
                </label>
                
                <div id="containerlabel1">
                <label for="mensagem" class="label-conteudo label-conteudo1">Condomínio:
                    <?php echo $nomeCondominio; ?>
                </label>
                </div>
                
                <div id="containerlabel2">
                <label for="mensagem" class="label-conteudo label-conteudo1">CNPJ:
                    <?php echo $_SESSION['cnpj']; ?>
                </label>
                </div>
                
                <div id="containerlabel3">
                <label for="mensagem" class="label-conteudo label-conteudo1">Número de moradores:
                    <?php echo $numeroMoradores?>
                </label>
                </div>

            </div>
            <div id="content2">
            
            <div id="content-img">
                <div class="form-perfil-div">
                <img src="../../imagens/profile.png" alt="exemplo" class="form-perfil-img" name="imagem"
                id="preview-ft-perfil">
            </div>
                <label for="input-file" class="label-enviar-img">Selecionar imagem</label>
                <input type="file" name="imagem" accept="image/jpeg, image/png, image/jpg" id="input-file" required>
            </div>

            <button class="custom-btn btn2" type="submit">Salvar alterações
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="none" d="M0 0h24v24H0z"></path>
                <path fill="currentColor"
                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                </path>
                </svg>
            </div>
            </button></a>

            </div>
        </div>

        
    </div>
    
    <script src="../../js/menulateral.js"></script>
    
    <script>
        let fotoperfil = document.getElementById("preview-ft-perfil");
        let inputfile = document.getElementById("input-file");

        inputfile.onchange = function () {
            fotoperfil.src = URL.createObjectURL(inputfile.files[0])
        }
    </script>
    
</body>

</html>