<?php
$servidor = "localhost";
$usuario = "root";
$senha = "123456";
$banco = "AquaLimpa"; 

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$nome_completo = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$sql = "INSERT INTO mensagens(nome_completo, email, telefone, mensagem)
VALUES ('$nome_completo', '$email', '$telefone', '$mensagem')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../index.html"); 
    exit;
} else {  
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
