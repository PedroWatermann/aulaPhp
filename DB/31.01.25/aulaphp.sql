-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/01/2025 às 18:16
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
-- Banco de dados: `aulaphp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `colaborador` varchar(180) NOT NULL,
  `data_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_produto`, `descricao`, `quantidade`, `colaborador`, `data_hora`) VALUES
(14, 4, 'Produto 4', 3, 'admin', '2025-01-31 14:31:55'),
(15, 3, 'Produto 3', 4, 'admin', '2025-01-31 14:32:17'),
(16, 4, 'Produto 4', 4, 'admin', '2025-01-31 14:32:17'),
(17, 4, 'Produto 4', 9, 'admin', '2025-01-31 14:52:40'),
(18, 3, 'Produto 3', 4, 'admin', '2025-01-31 15:22:12'),
(19, 3, 'Produto 3', 4, 'admin', '2025-01-31 15:23:30'),
(20, 3, 'Produto 3', 2, 'admin', '2025-01-31 15:27:33'),
(21, 3, 'Produto 3', 1, 'Pedro Watermann', '2025-01-31 17:27:00'),
(22, 4, 'Produto 4', 5, 'Pedro Watermann', '2025-01-31 17:27:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(254) NOT NULL,
  `unidade` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `descricao`, `unidade`, `quantidade`) VALUES
(4, 'Produto 4', 'caixa', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(180) NOT NULL,
  `genero` varchar(100) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(140) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `genero`, `cpf`, `senha`, `tipo`) VALUES
(1, 'admin', 'outro', '00000000000', '$argon2i$v=19$m=65536,t=4,p=1$aFRCQk9qNXhZeUlzWkhpQQ$yCAoavttO/XDcHVKhu8tddpKmLTtw/95riyr9PV9M/o', 'A'),
(2, 'Pedro Watermann', 'masculino', '11468339974', '$argon2i$v=19$m=65536,t=4,p=1$Qzdja21lMGxIMUt3TEw1OQ$dJ0Iow5vbuXzdIxgyQ+50MGv29xEYLZzvEl4Zodwg0w', 'C'),
(3, 'Sofia Watermann', 'feminino', '12312312312', '$argon2i$v=19$m=65536,t=4,p=1$L3ZKc2xDNlFkbDdMTlA4Mw$wj6m0AQDSDQXCI6SrguE7kRaxn4PLk2jleVhwSRncjk', 'C');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
