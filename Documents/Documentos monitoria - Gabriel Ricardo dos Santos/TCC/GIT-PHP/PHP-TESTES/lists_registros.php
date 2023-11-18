<?php
$servername = "sql113.infinityfree.com";
$username = "if0_35265838";
$password = "RydGeZVG52YR";
$database = "if0_35265838_sgc";

// Estabelece a conexão com o BD-PHPMyAdmin
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
}

// Consulta SQL para buscar todos os moradores cadastrados
$sql = "SELECT * FROM MORADOR";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Moradores Cadastrados</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Nome: " . $row['NOME'] . ", Email: " . $row['EMAIL'] ."</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum morador cadastrado.";
}

// Fecha a conexão
$conn->close();
?>