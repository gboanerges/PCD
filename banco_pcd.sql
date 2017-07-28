-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 28/07/2017 às 04:35
-- Versão do servidor: 5.7.19-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pcd_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `advertencias`
--

CREATE TABLE `advertencias` (
  `id` int(16) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `pontos` int(5) NOT NULL,
  `responsavel` varchar(255) NOT NULL,
  `indeferida` tinyint(1) NOT NULL,
  `membro` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `advertencias`
--

INSERT INTO `advertencias` (`id`, `motivo`, `data`, `pontos`, `responsavel`, `indeferida`, `membro`) VALUES
(14, 'motivo4', '2017-07-28', 2, '1', 0, 25),
(15, 'motivo6', '2017-07-28', 10, '1', 0, 27),
(16, 'motivo3', '2017-07-31', 4, '1', 1, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(16) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `cargo`) VALUES
(25, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'Conselheiro'),
(26, '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', 'Membro'),
(27, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', 'Diretor');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `advertencias`
--
ALTER TABLE `advertencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membro` (`membro`),
  ADD KEY `membro_2` (`membro`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `advertencias`
--
ALTER TABLE `advertencias`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
