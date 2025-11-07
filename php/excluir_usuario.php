<?php
include 'conexao.php';

$id = $_POST['id'] ?? null;

if (!$id) {
    echo "ID inválido.";
    exit;
}

$sql = "DELETE FROM tbUsuarios WHERE usuario_id = ?"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Usuário excluído com sucesso!";
} else {
    echo "Erro ao excluir usuário: " . $stmt->error; 
}

$stmt->close();
$conn->close();
?>