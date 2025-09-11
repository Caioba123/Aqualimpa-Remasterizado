-- Script SQL para criar o banco de dados AQUALIMPA
-- Execute este script no seu servidor MySQL

-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS AQUALIMPA;
USE AQUALIMPA;

-- Remover tabelas se existirem (cuidado em produção!)
DROP TABLE IF EXISTS mensagens;
DROP TABLE IF EXISTS pedidos;
DROP TABLE IF EXISTS usuarios;

-- Criar tabela de mensagens
CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(150) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20),
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela de pedidos
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    medidor VARCHAR(100),
    sensor VARCHAR(100),
    filtro VARCHAR(100),
    cep VARCHAR(9) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    endereco VARCHAR(150) NOT NULL,
    complemento VARCHAR(100),
    bairro VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    pagamento VARCHAR(50) NOT NULL,
    observacoes TEXT,
    data_pedido TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criar tabela de usuários
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir dados de exemplo (opcional)

-- Usuários de exemplo
INSERT INTO usuarios (nome, data_nascimento, email, senha) VALUES
('João Silva', '1990-05-15', 'joao@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Maria Santos', '1985-08-22', 'maria@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Carlos Oliveira', '1992-12-10', 'carlos@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Pedidos de exemplo
INSERT INTO pedidos (medidor, sensor, filtro, cep, estado, endereco, complemento, bairro, cidade, telefone, pagamento, observacoes) VALUES
('Medidor AP-3000', 'Sensor SV-500', 'Filtro FA-700G', '01234-567', 'SP', 'Rua das Flores, 123', 'Apto 45', 'Centro', 'São Paulo', '(11) 99999-9999', 'Cartão de Crédito', 'Entrega pela manhã'),
('Medidor AP-3000', NULL, 'Filtro FA-700G', '12345-678', 'RJ', 'Av. Copacabana, 456', NULL, 'Copacabana', 'Rio de Janeiro', '(21) 88888-8888', 'PIX', 'Porteiro 24h'),
(NULL, 'Sensor SV-500', NULL, '23456-789', 'MG', 'Rua Minas Gerais, 789', 'Casa', 'Savassi', 'Belo Horizonte', '(31) 77777-7777', 'Boleto', NULL);

-- Mensagens de exemplo
INSERT INTO mensagens (nome_completo, email, telefone, mensagem) VALUES
('Ana Costa', 'ana@email.com', '(11) 66666-6666', 'Gostaria de saber mais sobre os produtos de filtragem de água.'),
('Pedro Almeida', 'pedro@email.com', '(21) 55555-5555', 'Preciso de um orçamento para instalação de sistema completo.'),
('Lucia Ferreira', 'lucia@email.com', NULL, 'Quando vocês fazem entregas na região de Campinas?');

-- Verificar se as tabelas foram criadas
SHOW TABLES;

-- Verificar dados inseridos
SELECT 'Usuários:' as Tabela, COUNT(*) as Total FROM usuarios
UNION ALL
SELECT 'Pedidos:', COUNT(*) FROM pedidos
UNION ALL
SELECT 'Mensagens:', COUNT(*) FROM mensagens;

