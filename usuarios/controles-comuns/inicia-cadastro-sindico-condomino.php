<?php
session_start();
include('./conecta-banco.php');

$_SESSION['usuario-se-cadastrando'] = 'teste';

// Inicialize a mensagem como vazia
$mensagem = "";

// Receba os dados do formulário HTML
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = hash('sha256', $_POST['senha']);
$cargo = $_POST['cargo'];

$_SESSION['nome'] = $nome;
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;
$_SESSION['cargo'] = $cargo;

// Use declaração preparada para evitar injeção de SQL
$verificarEmail = $conn->prepare("SELECT COUNT(*) FROM MORADORES WHERE email = ?");
$verificarEmail->bind_param("s", $email);
$verificarEmail->execute();
$verificarEmail->bind_result($contagem);
$verificarEmail->fetch();
$verificarEmail->close();

// Verifique se o e-mail já existe
if ($contagem > 0) {
    $mensagem = "O e-mail já está cadastrado. Por favor, escolha outro e-mail.";
    header('location: ../telacadastro.php?mensagem=' . urlencode($mensagem));
    exit();
} else {
    if ($_SESSION['cargo'] == 0) {
        header('Location: ../condominos/tela-encontrar-condominio.php');
        exit();
    } else if ($_SESSION['cargo'] == 1) {
        header('Location: ../sindicos/tela-cadastro-condominio.php');
        exit();
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>