<?php

// Incluir o arquivo com a conexão com o banco de dados
include_once './conexao.php';
session_start();

// Recebe os dados enviados pelo Javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Query corrigida e utilizando prepared statements para evitar SQL injection
$query_criar_event = "INSERT INTO EVENTOS (TITULO, COR, INICIO, FIM, CONDOMINIO) VALUES (:title, :color, :start, :end, :condominio)";

$criar_event = $conn->prepare($query_criar_event);

// Substituir $_SESSION['cnpj'] por :condominio no bindParam
$criar_event->bindParam(':title', $dados['criar_title']);
$criar_event->bindParam(':color', $dados['criar_color']);
$criar_event->bindParam(':start', $dados['criar_start']);
$criar_event->bindParam(':end', $dados['criar_end']);
$criar_event->bindParam(':condominio', $_SESSION['cnpj']);

if ($criar_event->execute()) {
    $retorna = ['status' => true, 'msg' => 'Evento criado com sucesso!', 'id' => $conn->lastInsertId(), 'title' => $dados['criar_title'], 'color' => $dados['criar_color'], 'start' => $dados['criar_start'], 'end' => $dados['criar_end']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não criado!'];
}

echo json_encode($retorna);
?>
