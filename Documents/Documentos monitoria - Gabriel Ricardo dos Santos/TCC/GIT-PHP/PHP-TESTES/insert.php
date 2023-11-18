<?php
$servername = "sql113.infinityfree.com";
$username = "if0_35265838";
$password = "RydGeZVG52YR";
$database = "if0_35265838_sgc";

// Estabelece conexão com o BD-PHPMyAdmin
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
}

// Recebe os dados do formulário HTML
$nome = addslashes($_POST["nome"]);
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);
$escolha = addslashes($_POST['opcao']);

if (isset($_POST['opcao'])) {
    if ($escolha === 'morador') {
        $sql = $conn->prepare("INSERT INTO MORADOR (nome, email, senha) VALUES (?, ?, ?)");
    } else {
        $sql = $conn->prepare("INSERT INTO SINDICO (nome, email, senha) VALUES (?, ?, ?)");
    }

    if ($sql) {
        $sql->bind_param("sss", $nome, $email, $senha);

        if ($sql->execute()) {
            // Cadastro bem-sucedido, forneça um link para acessar a lista de dados
            echo "Cadastro realizado com sucesso!<br><br><a href='lists_registros.php'>Clique aqui</a> para acessar a lista de dados cadastrados.";
        } else {
            echo "Erro ao executar a consulta!";
        }
    } else {
        echo "Erro na preparação da consulta!";
    }
} else {
    echo "Opção não selecionada.";
}
$conn->close();
?>