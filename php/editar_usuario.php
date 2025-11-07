<?php
include 'conexao.php';

$id = $_POST['id'] ?? null;
$novo_nome = $_POST['nome_usuario'] ?? '';
$nova_senha = $_POST['senha'] ?? '';

if (!$id || empty($novo_nome) || empty($nova_senha)) {
    echo "Dados inválidos.";
    exit;
}

$nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

$sql = "UPDATE tbUsuarios SET nome = ?, senha = ? WHERE usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $novo_nome, $nova_senha_hash, $id);

if ($stmt->execute()) {
    echo "Usuário atualizado com sucesso!";
} else {
    echo "Erro ao atualizar usuário: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
