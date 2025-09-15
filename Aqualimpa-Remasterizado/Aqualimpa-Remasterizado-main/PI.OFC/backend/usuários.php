<?php
include_once("../backend/conexao.php");

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $sql = "SELECT id, nome, data_nascimento, email FROM usuarios";
    $result = $conexao->query($sql);

    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    echo json_encode($usuarios);
}

if ($method === 'POST') {
    $nome = $_POST['userName'];
    $dob = $_POST['userDob'];
    $email = $_POST['userEmail'];
    $senha = password_hash($_POST['userPassword'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nome, data_nascimento, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $dob, $email, $senha);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Usuário adicionado com sucesso!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao adicionar usuário"]);
    }
}

// PUT e DELETE podem ser implementados depois para editar/excluir
?>
