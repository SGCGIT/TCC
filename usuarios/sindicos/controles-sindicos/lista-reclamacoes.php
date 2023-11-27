<?
include_once("../../controles-comuns/conecta-banco");

$sql = "SELECT TITULO, TIPO, AUTOR, DATA_RECLAMACAO FROM RECLAMACOES";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

echo "<table border='1'>
            <tr>
                <th>Título</th>
                <th>Tipo</th>
                <th>Autor</th>
                <th>Data da Reclamação</th>
            </tr>";

while ($row = $result->fetch_assoc()) {
    $titulo = htmlspecialchars($row['TITULO']);
    $tipo = htmlspecialchars($row['TIPO']);
    $autor = htmlspecialchars($row['AUTOR']);
    $data_reclamacao = htmlspecialchars($row['DATA_RECLAMACAO']);

    echo "<tr>
                <td>$titulo</td>
                <td>$tipo</td>
                <td>$autor</td>
                <td>$data_reclamacao</td>
              </tr>";
}

echo "</table>";

$stmt->close();
$conn->close();
?>