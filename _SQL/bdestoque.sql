-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2024 às 18:38
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `IDDepartamento` int(11) NOT NULL,
  `nomeDep` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `departamentos`
--

INSERT INTO `departamentos` (`IDDepartamento`, `nomeDep`) VALUES
(4, 'financeiro'),
(5, 'administrat'),
(6, 'bola'),
(7, 'sinara'),
(8, 'administrat');

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
  `departamento` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`IDEstoque`, `nomeEstoque`, `quantidadeEstoque`, `quantidademinimaEstoque`, `armazenamento`, `departamento`) VALUES
(10, 'cabo', 3, 3, 2, 4),
(11, 'Lucas Rocha', 1, 3, 3, 4),
(12, 'cabo sata', 2, 3, 1, 4),
(14, 'Lucas Rocha', 1, 3, 1, 4),
(15, 'teclado', 13, 10, 2, 5),
(16, 'cabo', 3, 3, 3, 8);

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
  `qtdADD` int(11) NOT NULL,
  `dataADD` date NOT NULL,
  `horaADD` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mov_add`
--

INSERT INTO `mov_add` (`IDADD`, `IDProdutoFK`, `IDDepartamentoFK`, `qtdADD`, `dataADD`, `horaADD`) VALUES
(5, 15, 5, 4, '2024-12-02', '14:32:46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mov_retirada`
--

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
(8, 12, 4, 1, 'Lucas', '2024-12-02', '14:17:02'),
(9, 11, 4, 2, '3', '2024-12-02', '14:17:07'),
(10, 15, 5, 1, 'Lucas', '2024-12-02', '14:31:15');

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
  MODIFY `IDDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `IDEstoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `local_arm`
--
ALTER TABLE `local_arm`
  MODIFY `IDLocal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mov_add`
--
ALTER TABLE `mov_add`
  MODIFY `IDADD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mov_retirada`
--
ALTER TABLE `mov_retirada`
  MODIFY `IDRetirada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `mov_add_ibfk_1` FOREIGN KEY (`IDProdutoFK`) REFERENCES `estoque` (`IDEstoque`) ON DELETE CASCADE,
  ADD CONSTRAINT `mov_add_ibfk_2` FOREIGN KEY (`IDDepartamentoFK`) REFERENCES `departamentos` (`IDDepartamento`);

--
-- Restrições para tabelas `mov_retirada`
--
ALTER TABLE `mov_retirada`
  ADD CONSTRAINT `mov_retirada_ibfk_1` FOREIGN KEY (`IDProdutoFK`) REFERENCES `estoque` (`IDEstoque`) ON DELETE CASCADE,
  ADD CONSTRAINT `mov_retirada_ibfk_2` FOREIGN KEY (`IDDepartamentoFK`) REFERENCES `departamentos` (`IDDepartamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
