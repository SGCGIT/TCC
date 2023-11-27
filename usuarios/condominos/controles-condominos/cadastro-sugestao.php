<?php
include_once("./verifica-sessao-condomino.php");
include_once("../../controles-comuns/conecta-banco.php");

session_start();

$titulo = addslashes($_POST["titulo"]);
$descricao = addslashes($_POST["descricao"]);

// Inserindo os dados no BD
$stmt = $conn->prepare("INSERT INTO SUGESTOES (TITULO, DESCRICAO, AUTOR, CNPJ_CONDOMINIO) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $titulo, $descricao, $_SESSION['email'], $_SESSION['cnpj']);

if ($stmt->execute()) {
    // Cadastro bem-sucedido, forneça um link para acessar a lista como osdados
    header("Location: ../tela-sucesso-sugestoes.php");
} else {
    echo "Erro ao enviar reclamação: " . $stmt->error;
}
?>