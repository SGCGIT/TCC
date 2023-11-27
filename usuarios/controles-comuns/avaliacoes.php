<?php

// Recebe os dados do formulário HTML
$evento = addslashes($_POST["evento"]);
$nota = addslashes($_POST["nota"]);
$descricao = addslashes($_POST["descricao"]);


// Inserindo os dados no BD
$stmt = $conn->prepare("INSERT INTO AVALIACOES (evento, nota, descricao) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $evento,  $nota, $descricao);


if ($stmt->execute()) {
    // Cadastro bem-sucedido, forneça um link para acessar a lista como osdados
    header("Location: /telasucessoavaliacao.html");
} else {
    echo "Erro ao enviar avaliação: " . $stmt->error;
}


?>