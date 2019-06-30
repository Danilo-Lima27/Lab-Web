-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2019 às 01:47
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante 2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `slogan` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `foto` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`cod`, `nome`, `slogan`, `foto`, `login`, `senha`) VALUES
(1, 'Tá na Mesa', 'Tá na Mesa, Tá feito.', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `garcom`
--

CREATE TABLE `garcom` (
  `cod` int(11) NOT NULL,
  `endereco` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `escolaridade` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cpf` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dataNasc` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `garcom`
--

INSERT INTO `garcom` (`cod`, `endereco`, `escolaridade`, `cpf`, `telefone`, `nome`, `dataNasc`, `login`, `senha`) VALUES
(6, 'Gran', 'Médiokmklmkolmlkm', '89789-32', '798989897777', 'Dani', '06/07/2019', 'admin', '6ad4664ba23eac71b5ef5e826ea0c6cd'),
(9, 'lkjl', 'Fundamental', '9798787', '80980', 'Gil', '06/18/2019', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `endereco` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `rg` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cpf` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`cod`, `nome`, `endereco`, `telefone`, `email`, `rg`, `cpf`, `login`, `senha`) VALUES
(5, 'Matheus', 'Aruaru', '898989890', 'matheus@gmail.com', '898789989889', '989879-09', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `cod` int(11) NOT NULL,
  `codGarcom` int(11) DEFAULT NULL,
  `codProduto` int(11) DEFAULT NULL,
  `numMesa` int(11) DEFAULT NULL,
  `data` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `hora` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`cod`, `codGarcom`, `codProduto`, `numMesa`, `data`, `hora`) VALUES
(2, 9, 1, 1, '06/05/2019', '13:56'),
(3, 6, 1, 3, '06/25/2019', '5:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `tamanho` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `valor` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`cod`, `nome`, `tamanho`, `valor`, `categoria`) VALUES
(1, 'Macarrão', 'Pequeno', '10.51', 'Massa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `garcom`
--
ALTER TABLE `garcom`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_GarcomPedido` (`codGarcom`),
  ADD KEY `fk_ProdutoPedido` (`codProduto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `garcom`
--
ALTER TABLE `garcom`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_GarcomPedido` FOREIGN KEY (`codGarcom`) REFERENCES `garcom` (`cod`),
  ADD CONSTRAINT `fk_ProdutoPedido` FOREIGN KEY (`codProduto`) REFERENCES `produto` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
