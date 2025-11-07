<?php
include 'conexao.php';

if ($conn) {
    echo "Conexão com o banco de dados OK!";
} else {
    echo "Erro desconhecido na conexão.";
}
?>