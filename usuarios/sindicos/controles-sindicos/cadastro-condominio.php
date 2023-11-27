<?php

session_start();
if (!isset($_SESSION['usuario-se-cadastrando'])) {
    header('Location: ../../tela-login.php');
    exit();
}

include_once("../../controles-comuns/conecta-banco.php");

// Recebe os dados do formulário HTML
$nome = addslashes($_POST["nome"]);
$cnpj = addslashes($_POST["cnpj"]);
if (isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
    $imagem = "../IMAGEM/" . $_FILES["imagem"]["name"];
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
} else {
    $imagem = "";
}

// Insere os dados na tabela CONDOMINIO
$sql = $conn->prepare("INSERT INTO CONDOMINIOS (CNPJ, NOME, IMAGEM) VALUES (?, ?, ?)");
$sql->bind_param("sss", $cnpj, $nome, $imagem);

if ($sql->execute()) {
    // Obter o ID após a inserção
    $_SESSION['id-condominio'] = $cnpj;
    header("Location: ./finaliza-cadastro-sindico.php");
    exit();
} else {
    echo "Erro ao enviar reclamação: " . $sql->error;
}

// Feche a conexão com o banco de dados
$conn->close();
?>