<?php
include('./conecta-banco.php');

// Recebe os dados do formulário HTML
$titulo = addslashes($_POST["titulo"]);
$descricao = addslashes($_POST["descricao"]);

// Inserindo os dados no BD
$stmt = $conn->prepare("INSERT INTO SUGESTOES (titulo, descricao) VALUES (?, ?)");
$stmt->bind_param("ss", $titulo, $descricao);


if ($stmt->execute()) {
    // Cadastro bem-sucedido, forneça um link para acessar a lista como osdados
    header("Location: /telasucessosugestoes.html");
} else {
    echo "Erro ao enviar reclamação: " . $stmt->error;
}

?>