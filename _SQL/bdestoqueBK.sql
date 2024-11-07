-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2024 às 01:56
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
-- Banco de dados: `bdestoque1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `IDDepartamento` int(11) NOT NULL,
  `nomeDep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `IDEstoque` int(11) NOT NULL,
  `nomeEstoque` varchar(20) NOT NULL,
  `quantidadeEstoque` int(11) NOT NULL,
  `quantidademinimaEstoque` int(11) NOT NULL,
  `armazenamento` int(15) NOT NULL,
  `departamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`IDEstoque`, `nomeEstoque`, `quantidadeEstoque`, `quantidademinimaEstoque`, `armazenamento`, `departamento`) VALUES
(3, 'SSD 240 GB ', 4, 2, 2, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `local_arm`
--

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

CREATE TABLE `mov_add` (
  `IDADD` int(11) NOT NULL,
  `IDProdutoFK` int(11) NOT NULL,
  `IDDepartamentoFK` int(11) NOT NULL,
  `dataADD` date NOT NULL,
  `horaADD` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mov_retirada`
--

CREATE TABLE `mov_retirada` (
  `IDRetirada` int(11) NOT NULL,
  `IDProdutoFK` int(11) NOT NULL,
  `IDDepartamentoFK` int(11) NOT NULL,
  `respRetirada` int(11) NOT NULL,
  `dataRetirada` date NOT NULL,
  `horaRetirada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

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
  ADD KEY `armazenamento` (`armazenamento`);

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
  MODIFY `IDDepartamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `IDEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `local_arm`
--
ALTER TABLE `local_arm`
  MODIFY `IDLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mov_add`
--
ALTER TABLE `mov_add`
  MODIFY `IDADD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mov_retirada`
--
ALTER TABLE `mov_retirada`
  MODIFY `IDRetirada` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `estoque_ibfk_1` FOREIGN KEY (`armazenamento`) REFERENCES `local_arm` (`idLocal`);

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
