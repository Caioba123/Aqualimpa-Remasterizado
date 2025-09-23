<?php
include_once("conexao.php"); // aqui temos o $pdo do seu conexao.php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if (empty($email) || empty($senha)) {
        header("Location: erro_login.php");
        exit();
    }

    // Prepara consulta apenas pelo email
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['email'] = $user['email'];

        // Login bem-sucedido
        header("Location: http://localhost/Aqualimpa-Remasterizado-main/PI.OFC/index.html");
        exit();
    } else {
        // Email não encontrado ou senha errada
        header("Location: erro_login.php");
        exit();
    }
}
?>
