<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['usuario-se-cadastrando'])) {
    header('Location: ../../../tela-login.php');
    exit();
}

include_once("../../controles-comuns/conecta-banco.php");

$condominio = $_POST['cnpjCondominio'];

echo "<script> alert('$condominio') </script>";

$sql = $conn->prepare("INSERT INTO MORADORES_PENDENTES (EMAIL, SENHA, NOME, CARGO, CNPJ_CONDOMINIO) VALUES (?, ?, ?, ?, ?)");

if ($sql) {
    $sql->bind_param("sssss", $_SESSION['email'], $_SESSION['senha'], $_SESSION['nome'], $_SESSION['cargo'], $condominio);

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