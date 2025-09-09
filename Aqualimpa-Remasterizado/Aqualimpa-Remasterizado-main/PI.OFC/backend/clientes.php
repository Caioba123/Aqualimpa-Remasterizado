<?php include("../conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Usuários - Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css"> <!-- seu CSS -->
</head>
<body>
  <h2>Usuários Cadastrados</h2>
  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Email</th>
      <th>Data de Cadastro</th>
    </tr>
    <?php
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
                <td>{$row['data_cadastro']}</td>
              </tr>";
    }
    ?>
  </table>
</body>
</html>
