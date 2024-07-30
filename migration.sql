-- Criação do banco de dados
CREATE DATABASE OrganizacaoEventos;
USE OrganizacaoEventos;

-- Criação da tabela Cliente
CREATE TABLE Cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(100)
);

-- Criação da tabela Local
CREATE TABLE Local (
    id_local INT AUTO_INCREMENT PRIMARY KEY,
    tipo_local VARCHAR(100) NOT NULL,
    capacidade INT NOT NULL
);

-- Criação da tabela Evento
CREATE TABLE Evento (
    id_evento INT AUTO_INCREMENT PRIMARY KEY,
    tipo_evento VARCHAR(100) NOT NULL,
    numero_convidados INT NOT NULL,
    data_contratada DATE NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    id_cliente INT NOT NULL,
    FOREIGN KEY (id_cliente) REFERENCES Cliente(id_cliente)
);

-- Criação da tabela que representa a relação Realiza
CREATE TABLE Realiza (
    id_evento INT NOT NULL,
    id_local INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    PRIMARY KEY (id_evento, id_local),
    FOREIGN KEY (id_evento) REFERENCES Evento(id_evento),
    FOREIGN KEY (id_local) REFERENCES Local(id_local)
);