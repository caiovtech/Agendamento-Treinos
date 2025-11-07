<?php
include 'conexao.php';

$id = $_POST['id'] ?? null;
$nova_descricao = $_POST['descricao'] ?? '';
$nova_datahora_inicio = $_POST['datahora_inicio'] ?? '';
$nova_datahora_fim = $_POST['datahora_fim'] ?? '';
$nova_observacao = $_POST['observacao'] ?? null;

if (!$id || empty($nova_descricao) || empty($nova_datahora_inicio) || empty($nova_datahora_fim)) {
    die("Erro: ID ou campos obrigatórios para edição não fornecidos.");
}

$sql = "UPDATE tbTreinamentos 
        SET descricao = ?, datahora_inicio = ?, datahora_fim = ?, observacao = ?
        WHERE treinamento_id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssssi", 
    $nova_descricao, 
    $nova_datahora_inicio, 
    $nova_datahora_fim, 
    $nova_observacao, 
    $id
);

if ($stmt->execute()) {
    echo "Treinamento atualizado com sucesso!";
} else {
    echo "Erro ao atualizar treinamento: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>