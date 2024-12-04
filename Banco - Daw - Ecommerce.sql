-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2024 às 15:31
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
-- Banco de dados: `bancosd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'Moda Feminina'),
(2, 'Moda Masculina'),
(3, 'Acessórios'),
(4, 'Calçados'),
(5, 'Bolsas e Carteiras'),
(6, 'Roupas de Festa'),
(7, 'Roupas Casuais'),
(8, 'Joias'),
(9, 'Bijuterias e Joias'),
(10, 'Perfumes e Cosméticos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `senha` varchar(64) DEFAULT NULL,
  `nome_cliente` varchar(60) DEFAULT NULL,
  `adm` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `senha`, `nome_cliente`, `adm`) VALUES
(10, 'adm@email.com', 'd2452a0173d8fd9b6315a625efb38f79ad1db8763fab4cae0fc4c30589f134d5', 'admteste', 1),
(12, 'user@email.com', 'd2452a0173d8fd9b6315a625efb38f79ad1db8763fab4cae0fc4c30589f134d5', 'user', 0),
(21, 'user2@email.com', 'c3ce3cb05f5eeae911a01c634f60c3e23e7595fa4784f43c440ce3e2a3cbbab8', 'user2', 0),
(23, 'user3@email.com', 'd2452a0173d8fd9b6315a625efb38f79ad1db8763fab4cae0fc4c30589f134d5', 'user3', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id_pergunta` int(11) NOT NULL,
  `id_cliente_id_pergunta` int(11) DEFAULT NULL,
  `pergunta` varchar(60) DEFAULT NULL,
  `resposta` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `id_categoria_id` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `nome_produto` varchar(60) DEFAULT NULL,
  `disponibilidade` tinyint(1) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `ofertado` tinyint(1) DEFAULT NULL,
  `preco_original` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `id_categoria_id`, `valor`, `descricao`, `nome_produto`, `disponibilidade`, `foto`, `ofertado`, `preco_original`) VALUES
(24, 1, 199.99, 'Vestido elegante para festas e eventos. Tecido de alta qualidade.', 'Vestido de Festa', 1, 'prod1.png', NULL, NULL),
(25, 2, 149.9, 'Camisa masculina de algodão, confortável e estilosa.', 'Camisa Casual', 0, 'prod2.png', NULL, NULL),
(26, 3, 79.9, 'Cinto de couro legítimo, ideal para compor looks sofisticados.', 'Cinto de Couro', 1, 'prod3.png', NULL, NULL),
(27, 4, 249.9, 'Sapato social masculino, couro premium, perfeito para eventos formais.', 'Sapato Social', 1, 'prod4.png', NULL, NULL),
(28, 5, 89.9, 'Bolsa de couro sintético, com design moderno e espaço amplo.', 'Bolsa de Couro', 1, 'prod5.png', NULL, NULL),
(29, 6, 499.9, 'Vestido de festa longo, bordado à mão, ideal para ocasiões especiais.', 'Vestido Longo de Festa', 1, 'prod6.png', NULL, NULL),
(30, 7, 129.9, 'Conjunto de calças e blusas, para uso casual do dia a dia.', 'Conjunto Casual', 1, 'prod7.png', NULL, NULL),
(31, 8, 59.9, 'Conjunto de joias ricas em charme e casualidade', 'Conjunto de Joias', 1, 'prod8.png', NULL, NULL),
(32, 9, 139.9, 'Colar de prata com design exclusivo, com pedras naturais.', 'Colar de Prata', 0, 'prod9.png', NULL, NULL),
(33, 10, 99.9, 'Perfume feminino com fragrância floral e frutada, ideal para o dia a dia.', 'Perfume Floral', 0, 'prod10.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente_id` int(11) DEFAULT NULL,
  `pagamento` varchar(40) DEFAULT NULL,
  `entrega` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `id_cliente_id`, `pagamento`, `entrega`, `data`, `status`) VALUES
(24, 12, 'picpay', 'livramento', '2024-11-18', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `id_venda_produto` int(11) NOT NULL,
  `id_produto_id` int(11) DEFAULT NULL,
  `id_venda_id` int(11) DEFAULT NULL,
  `valor_unit` decimal(10,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda_produto`
--

INSERT INTO `venda_produto` (`id_venda_produto`, `id_produto_id`, `id_venda_id`, `valor_unit`, `quantidade`) VALUES
(13, 24, 24, 199.99, 2),
(14, 26, 24, 79.90, 1),
(15, 31, 24, 59.90, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `id_cliente_id_pergunta` (`id_cliente_id_pergunta`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria_id` (`id_categoria_id`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente_id` (`id_cliente_id`);

--
-- Índices de tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD PRIMARY KEY (`id_venda_produto`),
  ADD KEY `id_produto_id` (`id_produto_id`),
  ADD KEY `id_venda_id` (`id_venda_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `venda_produto`
--
ALTER TABLE `venda_produto`
  MODIFY `id_venda_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_cliente_id_pergunta`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_categoria_id`) REFERENCES `categoria` (`id_categoria`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_cliente_id`) REFERENCES `cliente` (`id_cliente`);

--
-- Restrições para tabelas `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD CONSTRAINT `venda_produto_ibfk_1` FOREIGN KEY (`id_produto_id`) REFERENCES `produto` (`id_produto`),
  ADD CONSTRAINT `venda_produto_ibfk_2` FOREIGN KEY (`id_venda_id`) REFERENCES `venda` (`id_venda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
