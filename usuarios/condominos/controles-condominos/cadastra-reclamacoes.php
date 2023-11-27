<?php
include_once("./verifica-sessao-condomino.php");
include_once("../../controles-comuns/conecta-banco.php");

$titulo = $_POST["titulo"];
$prioridade = $_POST["prioridade"];
$area = $_POST["area"];
$descricao = $_POST["descricao"];

$stmt = $conn->prepare("INSERT INTO RECLAMACOES (TITULO, PRIORIDADE, AREA, DESCRICAO, AUTOR, CNPJ_CONDOMINIO) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $titulo, $prioridade, $area, $descricao, $_SESSION['email'], $_SESSION['cnpj']);

if ($stmt->execute()) {
    header("Location: ../tela-sucesso-reclamacao.php");
} else {
    echo "Erro ao enviar reclamação: " . $stmt->error;
}
?>