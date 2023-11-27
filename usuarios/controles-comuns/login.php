<?php
session_start();
include('./conecta-banco.php');

// Inicialize a mensagem como vazia
$mensagem = "";

// Receba os dados do formulário HTML
$email = $_POST['email'];
$senha = hash('sha256', $_POST['senha']);

// Use declaração preparada para evitar injeção de SQL
$stmt = $conn->prepare("SELECT EMAIL, SENHA, CARGO FROM MORADORES WHERE EMAIL=? AND SENHA=?");

// Verifique se a preparação da consulta foi bem-sucedida
if ($stmt) {

    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($emailResult, $senhaResult, $cargo);
        $stmt->fetch();

        $_SESSION['email'] = $email;
        $_SESSION['cargo'] = $cargo;

        if ($cargo == '1') {
            header('Location: ../sindicos/tela-menu.php');
            exit(); // Certifique-se de usar exit() após header para garantir que nenhum código adicional seja executado.
        } else if ($cargo == '0') {
            header('Location: ../condominos/tela-menu.php');
            exit(); // Certifique-se de usar exit() após header para garantir que nenhum código adicional seja executado.
        }

    } else {
        // Verificar se o usuário também está em MORADORES_PENDENTES
        $stmtPendentes = $conn->prepare("SELECT EMAIL, SENHA, CARGO FROM MORADORES_PENDENTES WHERE EMAIL=? AND SENHA=?");

        if ($stmtPendentes) {
            $stmtPendentes->bind_param("ss", $email, $senha);
            $stmtPendentes->execute();
            $stmtPendentes->store_result();

            if ($stmtPendentes->num_rows > 0) {
                $mensagem = "O síndico do seu condomínio ainda não te autorizou. Aguarde aprovação.";
                header('location: ../../tela-login.php?mensagem=' . urlencode($mensagem));
            } else {
                $mensagem = "Usuário não encontrado ou senha incorreta.";
                header('location: ../../tela-login.php?mensagem=' . urlencode($mensagem));
            }

            // Feche a declaração preparada
            $stmtPendentes->close();
        } else {
            session_unset();
            session_destroy();
            echo "Erro na preparação da consulta de MORADORES_PENDENTES: " . $conn->error;
        }
    }

    // Feche a declaração preparada
    $stmt->close();
} else {
    session_unset();
    session_destroy();
    echo "Erro na preparação da consulta: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();
?>