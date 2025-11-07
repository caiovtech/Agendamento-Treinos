<?php
include 'conexao.php';

$nome_usuario = $_POST['nome'] ?? '';
$login_usuario = $_POST['login'] ?? '';
$senha = $_POST['senha'] ?? '';

if (empty($nome_usuario) || empty($login_usuario) || empty($senha)) {
    
    die("Preencha todos os campos."); 
}

$hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO tbUsuarios (nome, login, senha) VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sss", $nome_usuario, $login_usuario, $hash);

if ($stmt->execute()) {    
    echo "Usuário cadastrado com sucesso! Você pode voltar e fazer o login.";    
} else {    
    echo "Erro ao cadastrar usuário. Por favor, tente novamente ou escolha outro nome de usuário. Detalhe do erro: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>