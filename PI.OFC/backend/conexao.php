<?php
// Definir as credenciais de acesso ao banco de dados
$servidor = "localhost";  // Host do banco de dados
$usuario = "root";        // Usuário do banco de dados
$senha = "123456";        // Senha do banco de dados
$banco = "AQUALIMPA";     // Nome do banco de dados

// Criar a conexão com PDO
try {
    // Conectar ao banco de dados
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    
    // Configurar para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Caso haja erro de conexão
    die("Erro na conexão: " . $e->getMessage());
}
?>
