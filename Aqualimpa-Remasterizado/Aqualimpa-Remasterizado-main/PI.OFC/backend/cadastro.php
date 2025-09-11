<?php

$servidor = "localhost";
$usuario = "root";
$senha = "123456";
$banco = "AQUALIMPA"; 

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);


if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $data_nascimento = $_POST["data_nascimento"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

   
    $sql = "INSERT INTO usuarios (nome, data_nascimento, email, senha)
            VALUES ('$nome', '$data_nascimento', '$email', '$senha_criptografada')";

   
    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/Aqualimpa-Remasterizado/Aqualimpa-Remasterizado-main/PI.OFC/ "); 
    exit();
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conn);
    }
}

// Fecha a conexão
mysqli_close($conn);
?>