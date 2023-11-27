<?php
include_once("../../controles-comuns/conecta-banco.php");

if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']);

    $email = mysqli_real_escape_string($conn, $email);

    // Consulta para selecionar os dados do usuário da tabela de origem
    $selectQuery = "SELECT * FROM MORADORES_PENDENTES WHERE EMAIL = '$email'";
    $result = mysqli_query($conn, $selectQuery);

    if ($result) {
        $userData = mysqli_fetch_assoc($result);

        // Consulta para inserir o registro na tabela de destino
        $insertQuery = "INSERT INTO MORADORES (EMAIL, SENHA, NOME, CARGO, CONDOMINIO) VALUES (
                        '" . $userData['EMAIL'] . "',
                        '" . $userData['SENHA'] . "',
                        '" . $userData['NOME'] . "',
                        '" . $userData['CARGO'] . "',
                        '" . $userData['CONDOMINIO'] . "')";

        if (mysqli_query($conn, $insertQuery)) {
            // Registro inserido com sucesso na tabela de destino

            // Consulta para excluir o registro da tabela de origem
            $deleteQuery = "DELETE FROM MORADORES_PENDENTES WHERE EMAIL = '$email'";
            if (mysqli_query($conn, $deleteQuery)) {
                // Registro excluído com sucesso da tabela de origem
                header("location: ../tela-solicitacoes.php");
            } else {
                echo "Erro ao excluir o registro da tabela de origem: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao mover o registro para a tabela de destino: " . mysqli_error($conn);
        }
    } else {
        echo "Erro ao selecionar o registro da tabela de origem: " . mysqli_error($conn);
    }
} else {
    echo "E-mail não fornecido.";
}

// Fechar a conexão
$conn->close();
?>