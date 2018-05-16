-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 27-Nov-2017 às 21:09
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gerenciamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `sexo` varchar(40) NOT NULL,
  `idade` int(11) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `cpf` char(14) NOT NULL,
  `dataNasc` date NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `idFornecedor` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `foneF` varchar(40) NOT NULL,
  `foneC` varchar(40) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `cpf` char(14) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `idProduto` bigint(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor` double NOT NULL,
  `cor` varchar(50) NOT NULL,
  `marca` varchar(40) NOT NULL,
  `tamanho` varchar(30) NOT NULL,
  PRIMARY KEY (`idProduto`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
