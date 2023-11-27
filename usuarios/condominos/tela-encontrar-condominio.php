<?php
session_start();
if (!isset($_SESSION['usuario-se-cadastrando'])) {
    header('Location: ../../tela-login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/styleencontrarcond.css">
    <title>Document</title>
</head>

<body>
    <!----------------------------------TELA ENCONTRAR CONDOMÍNIO--------------------------------------------->

    <!----------------------------------CABEÇALHO--------------------------------------------->
    <div id="header">
    </div>

    <!----------------------------------TÍTULO DE BOAS VINDAS--------------------------------------------->
    <div id="content-wrapper">
        <p class="label-titulooficial">Seja bem vindo ao sistema gerenciador de condomínios!</p>

        <!----------------------------------DROPBOX CONDOMÍNIOS--------------------------------------------->

        <!----------------------------------CAIXA AZUL COM TEXTO---------------------------------------------->

        <div id="content">
            <form action="./controles-condominos/finaliza-cadastro-condomino.php" method="post"
                enctype="multipart/form-data">

                <div class="input-container">
                    <label for="titulo" class="label-cabecalho label-titulo">Procure por seu condomínio</label>
                    <label for="mensagem" class="label-mensagem label-mensagem1">Selecione seu condomínio (Escolha
                        atentamente):</label>

                    <div class="label-selecionar">
                        <label>Condomínio:</label>
                        <select name="cnpjCondominio" class="form-control">
                            <?php
                            include_once('../controles-comuns/conecta-banco.php');
                            $sql = "SELECT CNPJ, NOME FROM CONDOMINIOS";
                            $res = $conn->query($sql);

                            // Verifique se a consulta foi bem-sucedida
                            if (!$res) {
                                die("Erro na execução da consulta: " . $conn->error);
                            }

                            // Imprima as opções
                            while ($row = $res->fetch_object()) {
                                echo "<option value='" . $row->CNPJ . "'>" . $row->NOME . "</option>";
                            }

                            // Feche a conexão
                            $conn->close();
                            ?>
                        </select>
                    </div>

                    <!-- BOTÃO ENVIAR -->
                    <button class="custom-btn btn1" type="submit">Enviar
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"></path>
                                <path fill="currentColor"
                                    d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                                </path>
                            </svg>
                        </div>
                    </button>
                </div>
            </form>
        </div>
</body>

</html>