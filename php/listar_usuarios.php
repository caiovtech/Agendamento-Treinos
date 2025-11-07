<?php
include 'conexao.php';

header('Content-Type: application/json');

$sql = "SELECT usuario_id, nome FROM tbUsuarios ORDER BY usuario_id ASC";
$result = $conn->query($sql);

$usuarios = [];

while ($row = $result->fetch_assoc()) {
    $usuarios[] = [
        'id' => $row['usuario_id'], // JS espera 'id'
        'nome_usuario' => $row['nome'] // JS espera 'nome_usuario'
    ];
}

echo json_encode($usuarios);

$conn->close();
?>