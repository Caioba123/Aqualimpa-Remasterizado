<?php
include_once("conexao.php"); // Certifique-se de que $conexao é a variável usada no arquivo

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email) || empty($senha)) {
        header("Location: erro_login.php");
        exit();
    }

    // Prepara consulta apenas pelo email
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica a senha
        if (password_verify($senha, $user['senha'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];

            // Login bem-sucedido
            header("Location: http://localhost/Aqualimpa-Remasterizado/Aqualimpa-Remasterizado-main/PI.OFC/");
            exit();
        } else {
            // Senha incorreta
            header("Location: erro_login.php");
            exit();
        }
    } else {
        // Email não encontrado
        header("Location: erro_login.php");
        exit();
    }

    // Fecha a consulta
    $stmt->close();
    $conexao->close();
} else {
    // Caso acesse esse arquivo sem enviar POST
    header("Location: erro_login.php");
    exit();
}
?>
