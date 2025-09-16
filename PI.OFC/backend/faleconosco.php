<?php
include_once("conexao.php");
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO mensagens(nome, email,telefone,mensagem )
VALUES ('$nome', '$email', '$telefone', '$mensagem')";
if (mysqli_query($conexao, $sql))
{
     header("Location: http://localhost/Aqualimpa-Remasterizado/PI.OFC/index.html");
} else {  
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
mysqli_close($conexao);
?>
