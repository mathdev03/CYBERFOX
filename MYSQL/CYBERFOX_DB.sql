-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/12/2024 às 19:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cyberfox`
--
DROP DATABASE IF EXISTS `cyberfox`;
CREATE DATABASE IF NOT EXISTS `cyberfox` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cyberfox`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `adquirido`
--

DROP TABLE IF EXISTS `adquirido`;
CREATE TABLE `adquirido` (
  `codigo` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idjogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `adquirido`
--

INSERT INTO `adquirido` (`codigo`, `iduser`, `idjogo`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 3),
(4, 3, 2),
(5, 1, 3),
(6, 3, 10),
(7, 3, 11),
(8, 3, 12),
(9, 3, 13),
(10, 1, 11),
(11, 3, 14),
(12, 1, 14),
(13, 2, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliar`
--

DROP TABLE IF EXISTS `avaliar`;
CREATE TABLE `avaliar` (
  `id_avaliar` int(11) NOT NULL,
  `comentario_avaliar` varchar(255) DEFAULT NULL,
  `estrelas_avaliar` int(11) NOT NULL CHECK (`estrelas_avaliar` >= 1 and `estrelas_avaliar` <= 5),
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Ação'),
(2, 'Aventura'),
(3, 'Estratégia'),
(4, 'RPG'),
(5, 'Esporte'),
(6, 'Corrida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoriajogo`
--

DROP TABLE IF EXISTS `categoriajogo`;
CREATE TABLE `categoriajogo` (
  `idcategoria` int(11) NOT NULL,
  `idjogo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoriajogo`
--

INSERT INTO `categoriajogo` (`idcategoria`, `idjogo`) VALUES
(1, 2),
(2, 2),
(1, 10),
(3, 10),
(2, 10),
(1, 11),
(3, 11),
(5, 11),
(6, 11),
(4, 12),
(3, 12),
(1, 12),
(1, 13),
(2, 13),
(1, 14),
(2, 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE `compra` (
  `codigo` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idjogo` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `preco_compra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `compra`
--

INSERT INTO `compra` (`codigo`, `iduser`, `idjogo`, `id_status`, `preco_compra`) VALUES
(1, 1, 2, 1, 33.44),
(2, 2, 3, 1, 49.33);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conquista`
--

DROP TABLE IF EXISTS `conquista`;
CREATE TABLE `conquista` (
  `id_conquista` int(11) NOT NULL,
  `descricao_conquista` varchar(255) NOT NULL,
  `conquistastatus` int(11) NOT NULL,
  `idjogo` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `desenvolvedor`
--

DROP TABLE IF EXISTS `desenvolvedor`;
CREATE TABLE `desenvolvedor` (
  `id_desenvolvedor` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `desenvolvedor`
--

INSERT INTO `desenvolvedor` (`id_desenvolvedor`, `iduser`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE `jogos` (
  `id_jogo` int(11) NOT NULL,
  `titulo_jogo` varchar(255) NOT NULL,
  `descricao_jogo` varchar(255) NOT NULL,
  `foto_jogo` varchar(255) DEFAULT NULL,
  `preco_jogo` float NOT NULL,
  `iddev` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `jogos`
--

INSERT INTO `jogos` (`id_jogo`, `titulo_jogo`, `descricao_jogo`, `foto_jogo`, `preco_jogo`, `iddev`) VALUES
(2, 'Minecraft', 'É um jogo legal e incrível', 'minecraft2D.png', 33.44, 1),
(3, 'mario', 'CRIEI ESSE JOGO ', 'maxresdefault.jpg', 33.33, 1),
(10, 'GTA ', 'É um game loko', NULL, 203.22, 2),
(11, 'Pepsiman', 'em jogo pepsi', NULL, 34.22, 2),
(12, 'Shrek', 'É um jogo individual', NULL, 45.33, 2),
(13, 'Far cry', 'É um jogo de sobrevivencia', NULL, 450.33, 2),
(14, 'GTA San Andreas', 'É um jogo mundo aberto', NULL, 56.4, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `statuscompra`
--

DROP TABLE IF EXISTS `statuscompra`;
CREATE TABLE `statuscompra` (
  `id_status` int(11) NOT NULL,
  `descricao_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `statuscompra`
--

INSERT INTO `statuscompra` (`id_status`, `descricao_status`) VALUES
(1, 'Concluido'),
(2, 'Pendente'),
(3, 'Incompleto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `statusconquista`
--

DROP TABLE IF EXISTS `statusconquista`;
CREATE TABLE `statusconquista` (
  `codigo` int(11) NOT NULL,
  `nomes_conquista` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome_user` varchar(50) NOT NULL,
  `apelido_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `senha_user` varchar(255) NOT NULL,
  `foto_user` varchar(255) DEFAULT NULL,
  `sobre_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome_user`, `apelido_user`, `email_user`, `senha_user`, `foto_user`, `sobre_user`) VALUES
(1, 'CHAD', 'gigachad44', 'gigachad@hotmail.com', '19832003', 'GigaChad-meme-7.jpg', NULL),
(2, 'Teste', 'Playhard24', 'teste@hotmail.com', '19832003', 'GigaChad-meme-7.jpg', NULL),
(3, 'matheus', 'matheus', 'matheus@hotmail.com', '19832003', 'Teste.png', 'Sou incr&iacute;vel');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adquirido`
--
ALTER TABLE `adquirido`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idjogo` (`idjogo`);

--
-- Índices de tabela `avaliar`
--
ALTER TABLE `avaliar`
  ADD PRIMARY KEY (`id_avaliar`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `categoriajogo`
--
ALTER TABLE `categoriajogo`
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idjogo` (`idjogo`);

--
-- Índices de tabela `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idjogo` (`idjogo`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices de tabela `conquista`
--
ALTER TABLE `conquista`
  ADD PRIMARY KEY (`id_conquista`),
  ADD KEY `idjogo` (`idjogo`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `conquistastatus` (`conquistastatus`);

--
-- Índices de tabela `desenvolvedor`
--
ALTER TABLE `desenvolvedor`
  ADD PRIMARY KEY (`id_desenvolvedor`),
  ADD KEY `iduser` (`iduser`);

--
-- Índices de tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id_jogo`),
  ADD KEY `iddev` (`iddev`);

--
-- Índices de tabela `statuscompra`
--
ALTER TABLE `statuscompra`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices de tabela `statusconquista`
--
ALTER TABLE `statusconquista`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adquirido`
--
ALTER TABLE `adquirido`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `avaliar`
--
ALTER TABLE `avaliar`
  MODIFY `id_avaliar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `compra`
--
ALTER TABLE `compra`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `conquista`
--
ALTER TABLE `conquista`
  MODIFY `id_conquista` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desenvolvedor`
--
ALTER TABLE `desenvolvedor`
  MODIFY `id_desenvolvedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `statuscompra`
--
ALTER TABLE `statuscompra`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `adquirido`
--
ALTER TABLE `adquirido`
  ADD CONSTRAINT `adquirido_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `adquirido_ibfk_2` FOREIGN KEY (`idjogo`) REFERENCES `jogos` (`id_jogo`);

--
-- Restrições para tabelas `avaliar`
--
ALTER TABLE `avaliar`
  ADD CONSTRAINT `avaliar_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id_user`);

--
-- Restrições para tabelas `categoriajogo`
--
ALTER TABLE `categoriajogo`
  ADD CONSTRAINT `categoriajogo_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `categoriajogo_ibfk_2` FOREIGN KEY (`idjogo`) REFERENCES `jogos` (`id_jogo`);

--
-- Restrições para tabelas `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`idjogo`) REFERENCES `jogos` (`id_jogo`),
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `statuscompra` (`id_status`);

--
-- Restrições para tabelas `conquista`
--
ALTER TABLE `conquista`
  ADD CONSTRAINT `conquista_ibfk_1` FOREIGN KEY (`idjogo`) REFERENCES `jogos` (`id_jogo`),
  ADD CONSTRAINT `conquista_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id_user`),
  ADD CONSTRAINT `conquista_ibfk_3` FOREIGN KEY (`conquistastatus`) REFERENCES `statusconquista` (`codigo`);

--
-- Restrições para tabelas `desenvolvedor`
--
ALTER TABLE `desenvolvedor`
  ADD CONSTRAINT `desenvolvedor_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `usuarios` (`id_user`);

--
-- Restrições para tabelas `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_ibfk_1` FOREIGN KEY (`iddev`) REFERENCES `desenvolvedor` (`id_desenvolvedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
