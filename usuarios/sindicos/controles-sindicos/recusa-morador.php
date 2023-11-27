<?php
include_once("../../controles-comuns/conecta-banco.php");

if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']);

    $email = mysqli_real_escape_string($conn, $email);

    // Consulta para excluir o registro do usuário
    $sql = "DELETE FROM MORADORES_PENDENTES WHERE EMAIL = '$email'";

    if (mysqli_query($conn, $sql)) {
        header("location: ../tela-solicitacoes.php");
    } else {
        echo "Erro ao excluir o registro: " . mysqli_error($conn);
    }
}

?>