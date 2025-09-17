<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="icon" type="image/png" href="../assets/img/logos/Logo Aqua Limpa.png">
  <title>E-mail Já Cadastrado - AquaLimpa</title>
  <link rel="stylesheet" href="../assets/css/novo-cliente.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<style>
    /* Estilo para a página de erro */
.alert {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  text-align: center;
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
  border-radius: 5px;
}

.alert h1 {
  font-size: 24px;
  margin-bottom: 10px;
}

.alert p {
  font-size: 16px;
  margin-bottom: 20px;
}

.alert .btn {
  display: inline-block;
  padding: 10px 20px;
  background-color: #007bff;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  font-size: 16px;
}

.alert .btn:hover {
  background-color: #0056b3;
}

</style>
<body>
  <div class="container">
    <div class="alert">
      <h1>Esse e-mail já está cadastrado!</h1>
      <p>O e-mail que você tentou registrar já existe em nossa base de dados.</p>
      <p>Se você já tem uma conta, faça login.</p>
      <a href="login.php" class="btn">Ir para Login</a>
    </div>
  </div>

  <script src="../js/novo-cliente.js"></script>
</body>
</html>
