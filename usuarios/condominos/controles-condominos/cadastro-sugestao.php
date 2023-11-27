<?php
include_once("./verifica-sessao-condomino.php");
include_once("../../controles-comuns/conecta-banco.php");

// Recebe os dados do formulário HTML
$titulo = addslashes($_POST["titulo"]);
$descricao = addslashes($_POST["descricao"]);

// Inserindo os dados no BD
$stmt = $conn->prepare("INSERT INTO SUGESTOES (descricao, titulo, autor) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $descricao, $titulo, $_SESSION['email']);

if ($stmt->execute()) {
    // Cadastro bem-sucedido, forneça um link para acessar a lista como osdados
    header("Location: ../tela-sucesso-sugestoes.php");
} else {
    echo "Erro ao enviar reclamação: " . $stmt->error;
}
?>