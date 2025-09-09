-- Cria o banco e usa
CREATE DATABASE IF NOT EXISTS AquaLimpa CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE AquaLimpa;

-- =========================
-- TABELAS EXISTENTES
-- =========================
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS pedidos (
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
    observacoes TEXT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- =========================
-- NOVA TABELA: PRODUTOS
-- =========================
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- (Opcional) Popula com os produtos que você já usa no site
INSERT INTO produtos (nome, descricao, preco, imagem) VALUES
('Sensor de Vazamento', 'Monitoramento inteligente para ambientes conectados, com comunicação via rede sem fio e alta eficiência.', 90.00, '../produtos/Sensor de Água.png'),
('Filtrador de Água', 'Filtro moderno para eliminação de impurezas, garantindo água potável e sabor puro diretamente da torneira.', 80.00, '../produtos/Filtrador de Torneira.png'),
('Medidor de Parâmetros', 'Equipamento portátil para medir parâmetros da água com alta precisão, ideal para uso em campo ou laboratórios.', 70.00, '../produtos/Medidor de Qualidade da Água.png');
