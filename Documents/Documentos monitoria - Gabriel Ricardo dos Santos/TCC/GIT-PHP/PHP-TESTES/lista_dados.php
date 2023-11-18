<?php
$servername = "sql113.infinityfree.com";
$username = "if0_35265838";
$password = "RydGeZVG52YR";
$database = "if0_35265838_sgc";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Estabelece conexão com o BD-PHPMyAdmin
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
}

// Consulta SQL usando JOIN para obter dados de MORADOR e SINDICO
$sql = "SELECT M.*, S.* FROM MORADOR M
        LEFT JOIN SINDICO S ON M.emailSINDICO = S.EMAIL";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        // Exibe os dados
        while ($row = $result->fetch_assoc()) {
            echo "Nome Morador: " . $row["NOME"] . "<br>";
            echo "Email Morador: " . $row["EMAIL"] . "<br>";
            echo "Senha Morador: " . $row["SENHA"] . "<br>";
            echo "Email Sindico: " . $row["emailSINDICO"] . "<br>";
            echo "Nome Sindico: " . $row["NOME_SINDICO"] . "<br>";
            echo "Senha Sindico: " . $row["SENHA_SINDICO"] . "<br>";
            // Adicione outras colunas conforme necessário
            echo "<br>";
        }
    } else {
        echo "0 resultados encontrados.";
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
