-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2022 às 11:51
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mercadosystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(240) NOT NULL,
  `descricao` text NOT NULL,
  `qtde_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `nome_categoria`, `descricao`, `qtde_categoria`) VALUES
(1, 'Hortifruti', 'Frutas, verduras, legumes e diversos produtos frescos.', 0),
(3, 'Açougue', 'Carnes bovinas, suínas, embutidos, etc.', 0),
(4, 'Massas', 'Tipos de macarrão, lasanha, pastéis, etc.', 0),
(5, 'Padaria', 'Pães, doces e bolos.', 0),
(6, 'Bebidas', 'Alcoólicos, águas, refrigerantes, sucos, etc.', 0),
(7, 'Grãos', 'Tipos de feijão, milho, oleaginosas, etc', 0),
(8, 'Papelaria', 'Materiais escolares, cartolinas, etc.', 0),
(9, 'Produtos de limpeza', 'Produtos para a limpeza de casa, veículos, objetos etc.', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `ID_produto` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  `fk_ID_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`ID_produto`, `nome`, `descricao`, `preco`, `estoque`, `fk_ID_categoria`) VALUES
(244, 'Arroz branco', 'Arroz soltinho, vamos almoçarr?', '4.75', 8, 7),
(247, 'Tomate', 'Tomatinho vermelho', '2.89', 12, 1),
(248, 'Acelga', 'Hortaliça de longos talos.', '0.99', 15, 1),
(249, 'Brócolis', 'Uma mini árvore comestível', '3.99', 16, 1),
(250, 'Alvejante', 'Para tirar todas as sujeiras.', '4.99', 4, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` char(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`, `nome`, `sobrenome`, `cargo`) VALUES
(13, 'joanadacosta@gmail.com', '202cb962ac59075b964b07152d234b70', 'Joana', 'da Costa', 2),
(14, 'cleberasilva@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cleber', 'Augusto da Silva', 1),
(16, 'joelsinho02@gmail.com', '202cb962ac59075b964b07152d234b70', 'Joelson', 'Pereira', 2),
(17, 'biancacamilacorrea@gmail.com', '202cb962ac59075b964b07152d234b70', 'Bianca', 'Correa', 1),
(18, 'manu@gmail.com', '202cb962ac59075b964b07152d234b70', 'Manuela', 'Correa', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`ID_produto`),
  ADD KEY `fk_ID_categoria` (`fk_ID_categoria`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `ID_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_ID_categoria` FOREIGN KEY (`fk_ID_categoria`) REFERENCES `categoria` (`ID_categoria`),
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`fk_ID_categoria`) REFERENCES `categoria` (`ID_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
