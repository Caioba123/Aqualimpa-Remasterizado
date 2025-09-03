<?php
include_once("conexao.php");
$nome_completo = $_POST['nome_completo'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO mensagens(nome_completo, email,telefone,mensagem )
VALUES ('$nome_completo', '$email', '$telefone', '$mensagem')";
if (mysqli_query($conexao, $sql))
{
     header("Location: http://localhost/Aqualimpa-Remasterizado-main/Aqualimpa-Remasterizado-main/PI.OFC/index.html");
} else {  
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>
