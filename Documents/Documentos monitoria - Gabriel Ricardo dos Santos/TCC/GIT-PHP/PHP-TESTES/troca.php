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

// ÁREA DE RECEBIMENTO DOS DADOS DO FORMULÁRIO
$nomeMorador = addslashes($_POST["nomeMor"]);
$emailMorador = addslashes($_POST["emailMor"]);
$senhaMorador = addslashes($_POST["senhaMor"]);

$nomeSindico = addslashes($_POST["nomeSin"]);
$emailSindico = addslashes($_POST["emailSin"]);
$senhaSindico = addslashes($_POST["senhaSin"]);
// ÁREA DE RECEBIMENTO DOS DADOS DO FORMULÁRIO

// Inserir o morador na tabela SINDICO
$stmtSindicoInsert = $conn->prepare("INSERT INTO SINDICO (NOME, EMAIL, SENHA) VALUES (?, ?, ?)");
$stmtSindicoInsert->bind_param("sss", $nomeMorador, $emailMorador, $senhaMorador);

// Inserir o sindico antigo na tabela MORADOR
$stmtMoradorInsert = $conn->prepare("INSERT INTO MORADOR (NOME, EMAIL, SENHA) VALUES (?, ?, ?)");
$stmtMoradorInsert->bind_param("sss", $nomeSindico, $emailSindico, $senhaSindico);

// Excluir o sindico antigo
$stmtSindicoDelete = $conn->prepare("DELETE FROM SINDICO WHERE EMAIL = ?");
$stmtSindicoDelete->bind_param("s", $emailSindico);

// Iniciar uma transação para garantir que todas as operações ocorram ou falhem juntas
$conn->begin_transaction();

if ($stmtSindicoInsert->execute() && $stmtMoradorInsert->execute() && $stmtSindicoDelete->execute()) {
    // Todas as operações bem-sucedidas, commit da transação
    $conn->commit();
    echo "Troca de sindico realizada com sucesso! <a href='lista_dados.php'>Clique aqui</a> para acessar a lista de dados cadastrados.";
} else {
    // Alguma operação falhou, rollback da transação
    $conn->rollback();
    echo "Erro ao realizar a troca de sindico.";
}

// Fecha a conexão
$conn->close();
?>
