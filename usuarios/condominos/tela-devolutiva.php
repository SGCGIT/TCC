<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/styledevolutiva.css">
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
            <div class="input-container">
                <label for="titulo1" class="label-cabecalho label-titulo1">Devolutivas</label>
                <button class="btnmenu2" onclick="toggleMenu2()">
                <a href="#" class="">texto</a>
        </button>
            </div>
        </div>

        <!----------------------------------CAIXA DE OBSERVAÇÃO---------------------------------------------->
        <div id="menu2">
        <div class="detalhes">ggg</div>
        
     
     
    </div>
        <div id="content2">
            <span class="label-observacao">Acesse todas as devolutivas sobre suas reclamações, avaliações, sugestões e
                reservas bem aqui!</span>
        </div>

    </div>
    
    <script src="../../js/menulateral.js"></script>
    
    
    <script>
        function toggleMenu2() {
            var menu = document.getElementById("menu2");
            var content = document.getElementById("content");

            if (menu.style.width === "350px") {
                menu.style.width = "0";
            } else {
                menu.style.width = "350px";
            }
        }
        
    </script>
</body>

</html>