<?php
$servername = "sql113.infinityfree.com";
$username = "if0_35265838";
$password = "RydGeZVG52YR";
$database = "if0_35265838_sgc";

//ESTABELECE CONEXÃO COM O BD-PHPMYADMIN
$conn = new mysqli($servername, $username, $password, $database);
//VERIFICA A CONEXÃO
if($conn->connect_error){
    die("Falha na conexão com o Banco de Dados: " .$conn->connect_error);
}

//RECEBE OS DADOS DO FORMULÁRIO HTML
$nome = addslashes($_POST["nome"]);
$email = addslashes($_POST["email"]);
$senha = addslashes($_POST["senha"]);

//INSERINDO OS DADOS NO BD
$stmt = $conn->prepare("INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nome, $email, $senha);

//DADANDO PO RETORNO
if ($stmt->execute()) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro na inserção: " . $stmt->error;
}


//MOSTRAR OS DADOS CADASTRADOS
echo "<p>Nome: $nome</p>";
echo "<p>Email: $email</p>";

//FECHA A CONEXÃO
$conn->close();
?>