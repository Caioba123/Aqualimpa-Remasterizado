<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $data_nascimento = $_POST['data_nascimento'];
  $email = $_POST['email'];
  $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (nome, data_nascimento, email, senha)
          VALUES ('$nome', '$data_nascimento', '$email', '$senha')";

  if (mysqli_query($conn, $sql)) {
    echo "Usuário cadastrado com sucesso!";
  } else {
    echo "Erro: " . mysqli_error($conn);
  }
}
?>
