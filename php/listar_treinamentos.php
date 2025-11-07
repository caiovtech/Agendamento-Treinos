<?php
include 'conexao.php';
header('Content-Type: application/json');

$sql = "SELECT treinamento_id, descricao, datahora_inicio, datahora_fim, observacao 
        FROM tbTreinamentos 
        ORDER BY datahora_inicio DESC";

$result = $conn->query($sql);

$treinamentos = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $treinamentos[] = $row;
    }
}

echo json_encode($treinamentos);

$conn->close();
?>