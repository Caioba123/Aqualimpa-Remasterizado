<?php
include_once("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "INSERT INTO login (usuario, senha) VALUES ('$usuario', '$senha')";

if (mysqli_query($conexao, $sql)) {
    header("Location: http://localhost/Aqualimpa-Remasterizado/Aqualimpa-Remasterizado-main/PI.OFC/index.html");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>