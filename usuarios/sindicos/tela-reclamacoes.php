<?php
include_once("./controles-sindicos/verifica-sessao-sindico.php");
include_once("../controles-comuns/conecta-banco.php");

$buscaNumeroMoradores = $conn->prepare("SELECT COUNT(*) as numero_reclamacoes FROM RECLAMACOES WHERE CNPJ_CONDOMINIO = ?");
$buscaNumeroMoradores->bind_param("s", $_SESSION['cnpj']);
$buscaNumeroMoradores->execute();
$buscaNumeroMoradores->bind_result($numeroReclamacoes);
$buscaNumeroMoradores->fetch();
$buscaNumeroMoradores->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/stylereclamacoesSINDICO.css">
    <link rel="stylesheet" type="text/css" href="../../css/estilo-tabela.css">
    <link rel="stylesheet" type="text/css" href="../../css/Aresponsividademenu.css">
</head>

<body>
<style>
  #content {
    width: 78%;
    height: 78%;
    overflow: auto;
    border: 1px solid #ccc;
    padding: 10px;

    /* Estilizando a barra de rolagem para torná-la invisível em navegadores WebKit */
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: transparent transparent; /* Firefox */
  }

  #content::-webkit-scrollbar {
    width: 10px;
  }

  #content::-webkit-scrollbar-thumb {
    background-color: transparent;
  }

  #content::-webkit-scrollbar-track {
    background-color: transparent;
  }

  /* Adicione esta regra ao seu estilo CSS existente */
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
                <label for="titulo1" class="label-cabecalho label-titulo1">Reclamações</label>
                <?php
                
                
                if ($numeroReclamacoes < 1) {
                    echo '<h1>Ainda não temos nenhuma reclamacao, parabens!</h1>';
                } else {
                    $sql = "SELECT *
                            FROM RECLAMACOES
                            WHERE CNPJ_CONDOMINIO = ?
                            ORDER BY 
                              CASE 
                                WHEN PRIORIDADE = 'Urgente' THEN 1
                                WHEN PRIORIDADE = 'Importante' THEN 2
                                ELSE 3 
                              END,
                              DATA_HORA_REGISTRO;";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $_SESSION['cnpj']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    ?>

                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Prioridade</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($user_data = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $user_data['TITULO'] . "</td>";
                                    echo "<td>" . $user_data['PRIORIDADE'] . "</td>";
                                    echo "<td>" . $user_data['AUTOR'] . "</td>";
                                    echo "<td><a href=''>Ver mais</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!----------------------------------MENU 2---------------------------------------------->

        <div id="menu2">
            <div class="detalhes">ggg</div>

            <!----------------------------------CAIXA DE OBSERVAÇÃO---------------------------------------------->

            <div id="content2">
                <span class="label-observacao">Acesse as reclamações enviadas pelos moradores e fique ciente dos problemas
                    encontrados no seu condomínio.</span>
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
