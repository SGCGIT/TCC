<?php
include_once("./verifica-sessao-condomino.php");
include_once("../../controles-comuns/conecta-banco.php");

$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$area = $_POST["area"];
$tipo = $_POST["tipo"];

$stmt = $conn->prepare("INSERT INTO RECLAMACOES (TITULO, TIPO, AREA, DESCRICAO, AUTOR) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $titulo, $tipo, $area, $descricao, $_SESSION['email']);

if ($stmt->execute()) {
    header("Location: ../tela-sucesso-reclamacao.php");
} else {
    echo "Erro ao enviar reclamação: " . $stmt->error;
}
?>