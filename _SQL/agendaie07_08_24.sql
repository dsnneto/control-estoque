-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/08/2024 às 02:59
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agendaie`
--
CREATE DATABASE IF NOT EXISTS `agendaie` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agendaie`;

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
  `armazenamento` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`IDEstoque`, `nomeEstoque`, `quantidadeEstoque`, `quantidademinimaEstoque`, `armazenamento`) VALUES
(1, 'Hdmi', 23, 12, 'box4'),
(2, 'Hdmi', 23, 12, 'box4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE `movimentacao` (
  `IDM` int(11) NOT NULL,
  `DataM` date NOT NULL,
  `HoraM` time NOT NULL,
  `QtdM` int(11) NOT NULL,
  `IDEFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`IDM`, `DataM`, `HoraM`, `QtdM`, `IDEFK`) VALUES
(2, '2024-08-29', '21:50:00', -23, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`IDEstoque`);

--
-- Índices de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`IDM`),
  ADD KEY `IDEFK` (`IDEFK`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `IDEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `IDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD CONSTRAINT `movimentacao_ibfk_1` FOREIGN KEY (`IDEFK`) REFERENCES `estoque` (`IDEstoque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
