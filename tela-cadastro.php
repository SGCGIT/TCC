<?php
$mensagem = isset($_GET['mensagem']) ? urldecode($_GET['mensagem']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./css/stylecadastro.css">
    <script src="./script/validarNome.js"></script>
    <script src="./script/validarEmail.js"></script>
    <title>Cadastro</title>
</head>

<body>
    <!----------------------------------TELA CADASTRO DO USUÁRIO--------------------------------------------->

    <div class="content">
        <div class="info-user">
            <div class="form cad">

                <!----------------------------------CABEÇALHO---------------------------------------------->

                <div class="cabecalho cadastro">
                    <p class="titulo cadastro-titulo">Cadastre-se!</p>
                    <p class="subtitulo cadastro-link">Já possui uma conta? <span><a href="./tela-login.php"
                                class="linkcad">Entre aqui.</a></span></p>
                </div>

                <!----------------------------------CAIXAS DE TEXTO---------------------------------------------->

                <div class="formdados">
                    <form action="./usuarios/controles-comuns/inicia-cadastro-sindico-condomino.php" method="post"
                        id="meuFormulario" enctype="multipart/form-data">

                        <p class="label-infos-usuarios">Nome completo<span class="form-dados-obrigatorio">*</span></p>
                        <input type="text" name="nome" id="nome" class="form-input-text" oninput="validarNome(this)"
                            required>

                        <p class="label-infos-usuarios">Email <span class="form-dados-obrigatorio">*</span></p>
                        <input type="email" name="email" id="email" class="form-input-text" oninput="validarEmail(this)"
                            required>
                        <p class="mensagem">
                            <?php echo $mensagem; ?>
                        </p>

                        <p class=" label-infos-usuarios">Senha <span class="form-dados-obrigatorio">*</span></p>
                        <input type="password" name="senha" id="senha" class="form-input-text" required>

                        <!----------------------------------OPÇÕES SÍNDICO OU MORADOR---------------------------------------------->

                        <p class="label-sindico">Você é síndico ou morador?</p>
                        <div class="opcoes">
                            <div>
                                <label>
                                    <input type="radio" name="cargo" value="0">
                                    <span class="label-opcao opcao-sindico">Morador</span>
                                </label>
                                <label>
                                    <input type="radio" name="cargo" value="1">
                                    <span class="label-opcao opcao-morador">Síndico</span>
                                </label>
                            </div>
                        </div>

                        <!----------------------------------BOTAO VOLTAR---------------------------------------------->

                        <div class="buttons-container">
                            <button class="custom-btn btn1" onclick="window.location.href='./index.html'">Voltar
                                <div class="icon iconvoltar">
                                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        viewBox="0 0 1024 1024">
                                        <path
                                            d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                                        </path>
                                    </svg>
                                </div>
                            </button></a>

                            <!----------------------------------BOTÃO FINALIZAR---------------------------------------------->

                            <button class="custom-btn btn2" type="submit"> Finalizar
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>