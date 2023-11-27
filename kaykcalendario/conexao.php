<?php

// Inicio da conexão com o banco de dados utilizando PDO
$host = "127.0.0.1:3306";
$user = "u501157063_usersgc";
$pass = "Tccsgc2023@";
$dbname = "u501157063_sgc";
$port = 3306;

try {
    // Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    die("Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage());
}
    // Fim da conexão com o banco de dados utilizando PDO
