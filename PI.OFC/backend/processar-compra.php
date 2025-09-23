<?php
// Inclui a conexão com o banco de dados
include_once("conexao.php");  // Certifique-se de que o caminho está correto

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Escapa os valores recebidos do formulário para evitar SQL Injection
    $medidor = mysqli_real_escape_string($conn, $_POST['medidor']);
    $sensor = mysqli_real_escape_string($conn, $_POST['sensor']);
    $filtro = mysqli_real_escape_string($conn, $_POST['filtro']);

    $cep = mysqli_real_escape_string($conn, $_POST['cep']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
    $complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);

    $pagamento = mysqli_real_escape_string($conn, $_POST['pagamento']);
    $observacoes = mysqli_real_escape_string($conn, $_POST['observacoes']);

    // Monta o SQL de inserção
    $sql = "INSERT INTO pedidos 
            (medidor, sensor, filtro, cep, estado, endereco, complemento, bairro, cidade, telefone, pagamento, observacoes) 
            VALUES 
            ('$medidor', '$sensor', '$filtro', '$cep', '$estado', '$endereco', '$complemento', '$bairro', '$cidade', '$telefone', '$pagamento', '$observacoes')";

    // Executa a inserção
    if (mysqli_query($conn, $sql)) {
        // Redireciona para a página inicial
        header("Location: http://localhost/Aqualimpa-Remasterizado-main/PI.OFC/index.html");
        exit;
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }

    // Fecha a conexão
    mysqli_close($conn);
} else {
    echo "Nenhum dado enviado.";
}
?>
