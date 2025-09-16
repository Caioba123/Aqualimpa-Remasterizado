<?php
header('Content-Type: application/json');

// Conexão com o banco de dados
$host = "localhost";
$user = "root";       // altere se necessário
$pass = "";           // altere se necessário
$dbname = "aqualimpa"; // nome do seu banco de dados

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Erro na conexão com o banco: " . $conn->connect_error]);
    exit();
}

// Receber dados
$action = $_POST['action'] ?? '';
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$dob = $_POST['dob'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Função para retornar todos usuários
function getUsers($conn) {
    $sql = "SELECT id, name, dob, email, password FROM users ORDER BY id DESC";
    $result = $conn->query($sql);
    $users = [];

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }
    return $users;
}

// Criar usuário
if ($action === 'create') {
    if (!$name || !$dob || !$email || !$password) {
        echo json_encode(["success" => false, "message" => "Preencha todos os campos."]);
        exit();
    }

    // Criptografar senha
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name, dob, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $dob, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Usuário adicionado com sucesso!", "users" => getUsers($conn)]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao adicionar usuário: " . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
    exit();
}

// Atualizar usuário
if ($action === 'update') {
    if (!$id || !$name || !$dob || !$email) {
        echo json_encode(["success" => false, "message" => "Preencha todos os campos."]);
        exit();
    }

    // Se senha for preenchida, atualiza; senão mantém a antiga
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("UPDATE users SET name=?, dob=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $dob, $email, $hashedPassword, $id);
    } else {
        $stmt = $conn->prepare("UPDATE users SET name=?, dob=?, email=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $dob, $email, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Usuário atualizado com sucesso!", "users" => getUsers($conn)]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao atualizar usuário: " . $stmt->error]);
    }
    $stmt->close();
    $conn->close();
    exit();
}

// Excluir usuário
if ($action === 'delete') {
    if (!$id) {
        echo json_encode(["success" => false, "message" => "ID do usuário não informado."]);
        exit();
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Usuário excluído com sucesso!", "users" => getUsers($conn)]);
    } else {
        echo json_encode(["success" => false, "message" => "Erro ao excluir usuário: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();
    exit();
}

// Retornar todos os usuários (GET ou nenhum action)
echo json_encode(getUsers($conn));
$conn->close();
?>
