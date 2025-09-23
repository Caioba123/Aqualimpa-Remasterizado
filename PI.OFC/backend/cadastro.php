<?php
$servidor = "localhost";
$usuario = "root";
$senha = "123456";
$banco = "AQUALIMPA"; 

// Conexão com o banco de dados
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Escapa os valores recebidos do formulário
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);
    $data_nascimento = mysqli_real_escape_string($conn, $_POST["data_nascimento"]);

    // Verifica se o e-mail já existe
    $checkEmail = "SELECT id FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {
        echo "Erro: este e-mail já está cadastrado.";
    } else {
        // Criptografa a senha
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Insere os dados no banco incluindo data_nascimento
        $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento)
                VALUES ('$nome', '$email', '$senha_criptografada', '$data_nascimento')";

        if (mysqli_query($conn, $sql)) {
            // Redireciona para a página inicial após cadastro
            header("Location: http://localhost/aqua/aqua-main/Aqualimpa-Remasterizado-main/PI.OFC/index.html"); 
            exit();
        } else {
            echo "Erro ao cadastrar: " . mysqli_error($conn);
        }
    }
}

// Fecha a conexão
mysqli_close($conn);
?>
