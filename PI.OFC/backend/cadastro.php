<?php
include_once("conexao.php"); // Certifique-se de que $conexao é a variável usada no arquivo

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST['nome'] ?? '');
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // Verifica se o e-mail já existe
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        // E-mail já cadastrado
        header("Location: usuario_ja_cadastrado.php");
        exit();
    } else {
        // Senha criptografada
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir novo usuário no banco de dados
        $stmt = $conexao->prepare("INSERT INTO usuarios (nome, data_nascimento, email, senha) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        $stmt->bind_param("ssss", $nome, $data_nascimento, $email, $senha_criptografada);
        $stmt->execute();

        // Sucesso, redireciona para a página de login ou home
        header("Location: http://localhost/Aqualimpa-Remasterizado/Aqualimpa-Remasterizado-main/PI.OFC/index.html");
        exit();
    }

    // Fecha a consulta
    $stmt->close();
    $conexao->close();
} else {
    // Caso acesse esse arquivo sem enviar POST
    header("Location: erro_cadastro.php");
    exit();
}
?>
