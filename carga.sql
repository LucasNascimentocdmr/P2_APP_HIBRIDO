-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24/11/2023 às 14:54
-- Versão do servidor: 10.6.15-MariaDB-cll-lve
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u942302018_cargas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carga`
--

CREATE TABLE `carga` (
  `DATA` date NOT NULL,
  `HORA` time NOT NULL,
  `RECEBIDO` varchar(255) NOT NULL,
  `RT` int(11) NOT NULL,
  `DESCRICAO` varchar(255) NOT NULL,
  `SUBCLASSE` varchar(255) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `ORIGEM` varchar(100) NOT NULL,
  `DESTINO` varchar(100) NOT NULL,
  `PREVISAO` date NOT NULL,
  `SAIDA` datetime NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `PESO` int(11) NOT NULL,
  `RETIRADO` varchar(255) NOT NULL,
  `IDENTIFICACAO` int(11) NOT NULL,
  `EMPRESA` varchar(255) NOT NULL,
  `VALOR` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `OPERACAO` varchar(50) NOT NULL,
  `OBS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices de tabela `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carga`
--
ALTER TABLE `carga`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
