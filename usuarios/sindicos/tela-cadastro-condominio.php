<?php
session_start();
if (!isset($_SESSION['usuario-se-cadastrando'])) {
    header('Location: ../../tela-login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/stylecadastrocond.css">
    <title>Document</title>
</head>

<body>

    <!-----------------------------------TELA CADASTRO DO CONDOMÍNIO--------------------------------------------->

    <div class="content">
        <div class="info-user">
            <div class="form cadcond">


                <!----------------------------------CABEÇALHO--------------------------------------------->

                <div class="cabecalho selecionarimg">
                    <p class="titulo selecionarimg-titulo">Criação do grupo do condomínio</p>
                </div>

                <!----------------------------------SELECIONAR FOTO DE PERFIL--------------------------------------------->

                <div class="formdados">
                    <form action="./controles-sindicos/cadastro-condominio.php" method="post" id="imagemPerfil" enctype="multipart/form-data">
                        <p class="subtitulo">Selecione a foto de perfil (obrigatório).</p>
                        <div class="form-perfil-div">
                            <img src="../../imagens/profile.png" alt="exemplo" class="form-perfil-img" name="imagem"
                                id="preview-ft-perfil">
                        </div>
                        <label for="input-file" class="label-enviar-img">Selecionar</label>
                        <input type="file" name="imagem" accept="image/jpeg, image/png, image/jpg" id="input-file" required>


                        <p class="label-infos-usuarios">Nome<span class="form-dados-obrigatorio">*</span></p>
                        <input type="text" name="nome" id="" class="form-input-text" required>
                        <p class="label-infos-usuarios">CNPJ <span class="form-dados-obrigatorio">*</span></p>
                        <input type="number" name="cnpj" id="" class="form-input-text" required>

                        <!----------------------------------BOTÃO VOLTAR---------------------------------------------->

                        <div class="buttons-container">
                            <button class="custom-btn btn1">Voltar
                                <div class="icon iconvoltar">
                                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        viewBox="0 0 1024 1024">
                                        <path
                                            d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                                        </path>
                                    </svg>
                                </div>
                            </button></a>

                            <!----------------------------------BOTÃO CRIAR--------------------------------------------->

                            <button class="custom-btn btn2" type="submit">Criar
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
            </div>
        </div>
    </div>
    <script>
        let fotoperfil = document.getElementById("preview-ft-perfil");
        let inputfile = document.getElementById("input-file");

        inputfile.onchange = function () {
            fotoperfil.src = URL.createObjectURL(inputfile.files[0])
        }
    </script>
</body>

</html>