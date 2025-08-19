create database AquaLimpa;
use AquaLimpa;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medidor VARCHAR(255),
    sensor VARCHAR(255),
    filtro VARCHAR(255),
    cep VARCHAR(20),
    estado VARCHAR(50),
    endereco VARCHAR(255),
    complemento VARCHAR(100),
    bairro VARCHAR(100),
    cidade VARCHAR(100),
    telefone VARCHAR(20),
    pagamento VARCHAR(50),
    observacoes TEXT
);





DROP DATABASE AquaLimpa;
SELECT*FROM usuarios;
SELECT*FROM mensagens;
SELECT*FROM login;
SELECT*FROM pedidos;