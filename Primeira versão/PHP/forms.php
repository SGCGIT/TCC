<?php
$servername = "sql113.infinityfree.com";
$username = "if0_35265838";
$password = "RydGeZVG52YR";
$database = "if0_35265838_sgc";

// Estabelece conexão com o BD-PHPMyAdmin
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
}

// Recebe os dados do formulário HTML
$nome = addslashes($_POST["nome"]);
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);
if(isset($_FILES["imagem"]) && !empty($_FILES["imagem"])) {
    $imagem = "./imagem_usuarios/" . $_FILES["imagem"]["name"];
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem);
} else {
    $imagem = "";
}

// Inserindo os dados no BD
$stmt = $conn->prepare("INSERT INTO MORADOR (nome, email, senha, imagem) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $senha, $imagem);

if ($stmt->execute()) {
    // Cadastro bem-sucedido, forneça um link para acessar a lista como osdados
    echo "Cadastro realizado com sucesso! <a href='lista_dados.php'>Clique aqui</a> para acessar a lista de dados cadastrados.";
} else {
    echo "Erro ao cadastrar usuário: " . $stmt->error;
}

// Fecha a conexão
$conn->close();
?>