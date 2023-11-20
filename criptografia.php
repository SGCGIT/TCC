<?php
include('../conexao-banco/conectarBanco.php');
$conn = conectarBanco();

// Recebe os dados do formulário HTML
$senha = addslashes($_POST["senha"]);
$codificado = md5($senha);

// Substitua 'NOME_DA_SUA_TABELA' pelo nome real da sua tabela
$sql = $conn->prepare("INSERT INTO CRIPTOGRAFIA (senha) VALUES (?)");
$sql->bind_param("s", $codificado);

        if ($sql->execute()) {
            // Cadastro bem-sucedido, forneça um link para acessar a lista de dados
            echo "boa";
        } else {
            echo "Erro ao executar a consulta!";
        }
    


include('../conexao-banco/fecharConexao.php');
fecharConexao($conn);
?>
