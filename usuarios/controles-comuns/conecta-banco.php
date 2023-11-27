<?php
$servername = "127.0.0.1:3306";
$username = "u501157063_usersgc";
$password = "Tccsgc2023@";
$database = "u501157063_sgc";

// Estabelece conexão com o BD-PHPMyAdmin
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o Banco de Dados: " . $conn->connect_error);
}

?>