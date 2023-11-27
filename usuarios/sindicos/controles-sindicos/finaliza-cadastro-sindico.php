<?php
session_start();
if (!isset($_SESSION['usuario-se-cadastrando'])) {
    header('Location: ../../../tela-login.php');
    exit();
}

include_once("../../controles-comuns/conecta-banco.php");

$sql = $conn->prepare("INSERT INTO MORADORES (EMAIL, SENHA, NOME, CARGO, CNPJ_CONDOMINIO) VALUES (?, ?, ?, ?, ?)");

if ($sql) {
    $sql->bind_param("sssss", $_SESSION['email'], $_SESSION['senha'], $_SESSION['nome'], $_SESSION['cargo'], $_SESSION['id-condominio']);

    if ($sql->execute()) {
        header('location: ../../../tela-login.php');
        exit();
    } else {
        $mensagem = "Erro ao executar a consulta: " . $sql->error;
    }
    $sql->close();
} else {
    $mensagem = "Erro na preparação da consulta: " . $conn->error;
}

session_unset();
session_destroy();
?>