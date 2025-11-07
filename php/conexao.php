<?php

$host = "x4y5s6asf79.mysql.dbaas.com.br";
$user = "x4y5s6asf79";
$pass = "WM@2o7rdsbCVSW";
$db = "x4y5s6asf79";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
