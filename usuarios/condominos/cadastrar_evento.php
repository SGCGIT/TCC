<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './conexao.php';

// Recebe os dados enviado pelo Javascript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_criar_event = "INSERT INTO EVENTOS (TITULO, COR, INICIO, FIM) VALUES (:title, :color, :start, :end)";

$criar_event = $conn->prepare($query_criar_event);

$criar_event->bindParam(':title', $dados['criar_title']);
$criar_event->bindParam(':color', $dados['criar_color']);
$criar_event->bindParam(':start', $dados['criar_start']);
$criar_event->bindParam(':end', $dados['criar_end']);


if ($criar_event->execute()) {

    $retorna = ['status' => true, 'msg' => 'Evento criado com sucesso!', 'id' => $conn->lastInsertId(), 'title' => $dados['criar_title'], 'color' => $dados['criar_color'], 'start' => $dados['criar_start'], 'end' => $dados['criar_end']];
} else {
    $retorna = ['status' => false, 'msg' => 'Erro: Evento não criado!'];
}

echo json_encode($retorna);