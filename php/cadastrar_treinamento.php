<?php
include 'conexao.php';

$descricao = $_POST['descricao'] ?? '';
$datahora_inicio = $_POST['datahora_inicio'] ?? '';
$datahora_fim = $_POST['datahora_fim'] ?? '';
$observacao = $_POST['observacao'] ?? null;
$pessoa_id = $_POST['pessoa_id'] ?? null;
$treinamento_tipo_id = $_POST['treinamento_tipo_id'] ?? null;

if (empty($descricao) || empty($datahora_inicio) || empty($datahora_fim) || empty($pessoa_id) || empty($treinamento_tipo_id)) {
    die("Erro: Faltam campos obrigatórios (descrição, datas, responsável ou tipo).");
}

$sql = "INSERT INTO tbTreinamentos 
        (descricao, datahora_inicio, datahora_fim, pessoa_id, treinamento_tipo_id, observacao) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sssiis", 
    $descricao, 
    $datahora_inicio, 
    $datahora_fim, 
    $pessoa_id, 
    $treinamento_tipo_id, 
    $observacao
);

if ($stmt->execute()) {
    echo "Treinamento cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar treinamento: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>