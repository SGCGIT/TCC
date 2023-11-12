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
$cargo = addslashes($_POST["cargo"]);


// Inserindo os dados no BD
$stmt = $conn->prepare("INSERT INTO RECLAMACOES (nome, email, senha, cargo) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $senha, $cargo);


if ($stmt->execute()) {
    // Cadastro bem-sucedido, forneça um link para acessar a lista como osdados
    echo "Reclamação realizada com sucesso!";
} else {
    echo "Erro ao enviar reclamação: " . $stmt->error;
}

// Fecha a conexão
$conn->close();
?>