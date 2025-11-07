<?php
include 'conexao.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    die("Erro: ID do treinamento inválido ou não fornecido.");
}

$sql = "DELETE FROM tbTreinamentos WHERE treinamento_id = ?";
$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Treinamento excluído com sucesso!";
} else {
    echo "Erro ao excluir treinamento: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>