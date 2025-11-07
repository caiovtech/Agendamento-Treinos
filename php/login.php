<?php
include 'conexao.php';
session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tbUsuarios WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['login'];
        header("Location: ../dashboard.html");
        exit;
    } else {
        echo "<script>alert('Senha incorreta.'); history.back();</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado.'); history.back();</script>";
}

$stmt->close();
$conn->close();
?>
