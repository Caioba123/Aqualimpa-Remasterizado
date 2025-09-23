<?php
session_start();

$senha_correta = 'admin123'; // Defina sua senha aqui

if (isset($_POST['password'])) {
    if ($_POST['password'] === $senha_correta) {
        $_SESSION['logged_in'] = true; // Define que o usuário está logado
        header('Location: dashboard.php'); // Redireciona para o dashboard.html
        exit;
    } else {
        $error = "Senha incorreta.";
    }
}

// Se o usuário já estiver logado, redireciona direto para o dashboard
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Login - Dashboard Protegido</title>
    <style>
        /* Estilos do formulário */
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Acesso Restrito</h2>
        <form method="post" action="">
            <input type="password" name="password" placeholder="Digite a senha" required />
            <br />
            <button type="submit">Entrar</button>
        </form>
        <?php if (isset($error)): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
