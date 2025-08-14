<?php
include_once("conexao.php");


$medidor = $_POST['medidor'];
$sensor = $_POST['sensor'];
$filtro = $_POST['filtro'];


$cep = $_POST['cep'];
$estado = $_POST['estado'];
$endereco = $_POST['endereco'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$telefone = $_POST['telefone'];


$pagamento = $_POST['pagamento'];


$observacoes = $_POST['observacoes'];


$sql = "INSERT INTO pedidos 
(medidor, sensor, filtro, cep, estado, endereco, complemento, bairro, cidade, telefone, pagamento, observacoes) 
VALUES 
('$medidor', '$sensor', '$filtro', '$cep', '$estado', '$endereco', '$complemento', '$bairro', '$cidade', '$telefone', '$pagamento', '$observacoes')";


if (mysqli_query($conexao, $sql)) {
  header("Location: http://localhost/PI.OFC/index.html");
    exit;
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>