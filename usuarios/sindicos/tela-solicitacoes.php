<?php
include_once("./controles-sindicos/verifica-sessao-sindico.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/stylessolicitacoesSINDICO.css">
</head>

<body>
    
    <style>
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    padding: 10px;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #FFFFFF;
}

tr:hover {
    background-color: transparent !important;
}

caption {
    font-size: 1.5em;
    margin-bottom: 10px;
}

</style>

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
            <div class="input-container">
                <label for="titulo1" class="label-cabecalho label-titulo1">Solicitações de entrada</label>
                <?php
                include_once("../controles-comuns/conecta-banco.php");

                $sql = "SELECT NOME, EMAIL FROM MORADORES_PENDENTES WHERE CNPJ_CONDOMINIO = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $_SESSION['cnpj']);
                $stmt->execute();
                $result = $stmt->get_result();

                ?>

                <div class="">
                    <table class="table text-black">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Recusar</th>
                                <th scope="col">Aceitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($user_data = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $user_data['NOME'] . "</td>";
                                echo "<td>" . $user_data['EMAIL'] . "</td>";

                                echo "<td>
                                        <a class='teste' href='./controles-sindicos/recusa-morador.php?email=" . urlencode($user_data['EMAIL']) . "'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                                            <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z'/>
                                      </svg>
                                    </td>";

                                echo "<td>
                                        <a class='btn btn-sm btn-primary' href='./controles-sindicos/aceita-morador.php?email=" . urlencode($user_data['EMAIL']) . "'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
                                            <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022'/>
                                        </svg>
                                    </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!----------------------------------CAIXA DE OBSERVAÇÃO---------------------------------------------->

        <div id="content2">
            <span class="label-observacao">Aqui você pode encontrar todos os usuários que desejam acessar o grupo do seu
                condomínio. Analise cada um com atenção para não permitir a entrada de alguém indesejado.</span>
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