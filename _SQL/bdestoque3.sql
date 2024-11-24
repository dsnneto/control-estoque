-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2024 às 04:00
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdestoque`
--
CREATE DATABASE IF NOT EXISTS `bdestoque` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdestoque`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `IDDepartamento` int(11) NOT NULL,
  `nomeDep` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `departamentos`
--

INSERT INTO `departamentos` (`IDDepartamento`, `nomeDep`) VALUES
(4, 'financeiro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque` (
  `IDEstoque` int(11) NOT NULL,
  `nomeEstoque` varchar(20) NOT NULL,
  `quantidadeEstoque` int(11) NOT NULL,
  `quantidademinimaEstoque` int(11) NOT NULL,
  `armazenamento` int(15) NOT NULL,
  `departamento` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`IDEstoque`, `nomeEstoque`, `quantidadeEstoque`, `quantidademinimaEstoque`, `armazenamento`, `departamento`) VALUES
(5, 'makita', 1235, 12, 1, 4),
(6, 'cabo', 27, 20, 2, 4),
(7, 'HDMI', 123, 2, 2, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `local_arm`
--

DROP TABLE IF EXISTS `local_arm`;
CREATE TABLE `local_arm` (
  `IDLocal` int(11) NOT NULL,
  `nomeLocal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `local_arm`
--

INSERT INTO `local_arm` (`IDLocal`, `nomeLocal`) VALUES
(1, 'BOX 1'),
(2, 'BOX 2'),
(3, 'BOX 3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mov_add`
--

DROP TABLE IF EXISTS `mov_add`;
CREATE TABLE `mov_add` (
  `IDADD` int(11) NOT NULL,
  `IDProdutoFK` int(11) NOT NULL,
  `IDDepartamentoFK` int(11) NOT NULL,
  `qtdADD` int(11) NOT NULL,
  `dataADD` date NOT NULL,
  `horaADD` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mov_add`
--

INSERT INTO `mov_add` (`IDADD`, `IDProdutoFK`, `IDDepartamentoFK`, `qtdADD`, `dataADD`, `horaADD`) VALUES
(1, 6, 4, 12, '2024-11-23', '23:57:52'),
(2, 6, 4, 12, '2024-11-23', '23:57:58'),
(3, 5, 4, 1234, '2024-11-23', '23:58:09'),
(4, 7, 4, 123, '2024-11-23', '23:58:21');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mov_retirada`
--

DROP TABLE IF EXISTS `mov_retirada`;
CREATE TABLE `mov_retirada` (
  `IDRetirada` int(11) NOT NULL,
  `IDProdutoFK` int(11) NOT NULL,
  `IDDepartamentoFK` int(11) NOT NULL,
  `qtdRetirada` int(11) NOT NULL,
  `respRetirada` varchar(40) NOT NULL,
  `dataRetirada` date NOT NULL,
  `horaRetirada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mov_retirada`
--

INSERT INTO `mov_retirada` (`IDRetirada`, `IDProdutoFK`, `IDDepartamentoFK`, `qtdRetirada`, `respRetirada`, `dataRetirada`, `horaRetirada`) VALUES
(1, 6, 4, 0, '0', '2024-11-23', '22:22:48'),
(2, 6, 4, 0, '0', '2024-11-23', '22:23:05'),
(3, 5, 4, 0, '0', '2024-11-23', '22:24:03'),
(4, 5, 4, 0, '0', '2024-11-23', '22:24:15'),
(5, 6, 4, 3, 'Lucas', '2024-11-23', '22:41:30'),
(6, 7, 4, 12, 'Lucas', '2024-11-23', '23:06:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(150) NOT NULL,
  `telefoneUsuario` varchar(60) NOT NULL,
  `userUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `telefoneUsuario`, `userUsuario`, `senhaUsuario`) VALUES
(6, 'lucas', '18991527311', 'admin', '$2y$10$djs6zS2UWhtMwk.nfb4GeeB9uu9Jmtg.JUH0tjvcRQpCzDo07.R1G'),
(7, 'luciano', '18991527311', 'lulu', '$2y$10$W.kM8g4FYWxhBLry3Z8xBuK2V0sZGyVthwFHnAKMcGW9/Ks0UetUW'),
(8, 'luciano', '18991527311', 'lulu', '$2y$10$VsH.E5zlLg3SU6gV3WNpl.Gn6NI0IdM5yCkYXfk.pu841kohQILtm'),
(9, 'ana', '18991527311', 'ana', '$2y$10$eHp7iVGZ7OFa1MZXFx78mOUNSPyndAmG7fPBV7oc8JPwbOH3/.ZU.'),
(10, 'ana', '18991527311', 'ana', '$2y$10$R3nUJjasIEDMBEhs1GE.l.DTU2lq4XasJhnVmC8IQcXW/5hkgf1XK');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`IDDepartamento`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`IDEstoque`),
  ADD KEY `armazenamento` (`armazenamento`),
  ADD KEY `departamento` (`departamento`);

--
-- Índices de tabela `local_arm`
--
ALTER TABLE `local_arm`
  ADD PRIMARY KEY (`IDLocal`);

--
-- Índices de tabela `mov_add`
--
ALTER TABLE `mov_add`
  ADD PRIMARY KEY (`IDADD`),
  ADD KEY `IDProdutoFK` (`IDProdutoFK`),
  ADD KEY `IDDepartamentoFK` (`IDDepartamentoFK`);

--
-- Índices de tabela `mov_retirada`
--
ALTER TABLE `mov_retirada`
  ADD PRIMARY KEY (`IDRetirada`),
  ADD KEY `IDProdutoFK` (`IDProdutoFK`),
  ADD KEY `IDDepartamentoFK` (`IDDepartamentoFK`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `IDDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `IDEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `local_arm`
--
ALTER TABLE `local_arm`
  MODIFY `IDLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mov_add`
--
ALTER TABLE `mov_add`
  MODIFY `IDADD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `mov_retirada`
--
ALTER TABLE `mov_retirada`
  MODIFY `IDRetirada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`armazenamento`) REFERENCES `local_arm` (`IDLocal`),
  ADD CONSTRAINT `estoque_ibfk_2` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`IDDepartamento`);

--
-- Restrições para tabelas `mov_add`
--
ALTER TABLE `mov_add`
  ADD CONSTRAINT `mov_add_ibfk_1` FOREIGN KEY (`IDProdutoFK`) REFERENCES `estoque` (`IDEstoque`),
  ADD CONSTRAINT `mov_add_ibfk_2` FOREIGN KEY (`IDDepartamentoFK`) REFERENCES `departamentos` (`IDDepartamento`);

--
-- Restrições para tabelas `mov_retirada`
--
ALTER TABLE `mov_retirada`
  ADD CONSTRAINT `mov_retirada_ibfk_1` FOREIGN KEY (`IDProdutoFK`) REFERENCES `estoque` (`IDEstoque`),
  ADD CONSTRAINT `mov_retirada_ibfk_2` FOREIGN KEY (`IDDepartamentoFK`) REFERENCES `departamentos` (`IDDepartamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
