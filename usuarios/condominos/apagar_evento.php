<?php

// Incluir o arquivo com a conexão com banco de dados
include_once './conexao.php';

$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){

    $query_apagar_event = "DELETE FROM EVENTOS WHERE idEvent=:id";

    $apagar_event = $conn->prepare($query_apagar_event);

    $apagar_event->bindParam(':id', $id);

    if($apagar_event->execute()){

        $retorna = ['status' => true, 'msg' => 'Evento apagado com sucesso!'];

    }else{

        $retorna = ['status' => false, 'msg' => 'Erro: Evento não apagado!'];
    }

}else{ // else quando o id estiver vazio
    $retorna = ['status' => false, 'msg' => 'Erro: Necessario enviar o id do evento!'];
}

echo json_encode($retorna);

