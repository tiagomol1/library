-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2020 às 02:14
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE `amigos` (
  `amiCodigo` int(11) NOT NULL,
  `amiNome` varchar(50) NOT NULL,
  `amiEmail` varchar(60) NOT NULL,
  `amiTelefone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`amiCodigo`, `amiNome`, `amiEmail`, `amiTelefone`) VALUES
(1, 'Zá da Esquina', 'ze@bol', '123'),
(2, 'Tiao bobao', 'tiao@uol', '456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `empCodigo` int(11) NOT NULL,
  `empDataEmp` char(10) NOT NULL,
  `empDataDev` char(10) NOT NULL,
  `livCodigo` int(11) NOT NULL,
  `amiCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`empCodigo`, `empDataEmp`, `empDataDev`, `livCodigo`, `amiCodigo`) VALUES
(1, '2020-05-01', '', 3, 1),
(4, '2020-04-21', '2020-05-22', 8, 2),
(6, '2020-01-23', '2020-05-12', 2, 1),
(7, '2020-04-21', '', 7, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `genCodigo` int(11) NOT NULL,
  `genNome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`genCodigo`, `genNome`) VALUES
(6, 'História - Batalhas'),
(8, 'Filosofia Política');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `livCodigo` int(11) NOT NULL,
  `livTitulo` char(80) NOT NULL,
  `livAutor` char(50) NOT NULL,
  `livPaginas` int(11) NOT NULL,
  `genCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`livCodigo`, `livTitulo`, `livAutor`, `livPaginas`, `genCodigo`) VALUES
(2, 'Sobre a Tirania', 'Timothy Snyder', 230, 8),
(3, 'Manual de Conversação em Inglês', 'Open English', 457, 4),
(4, 'Os Manuscritos do Mar Morto', 'Edmund Wilson', 270, 8),
(5, 'Berlim, 1945', 'Antohony Beevor', 230, 6),
(7, ' Enciclopédia das Guerras e Revoluções', 'Francisco C T da Silva', 1200, 6),
(8, 'Idade Média: Religião, Cultura e Política', 'Victor A G Silva', 180, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuCodigo` int(11) NOT NULL,
  `usuLogin` varchar(15) NOT NULL,
  `usuSenha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuCodigo`, `usuLogin`, `usuSenha`) VALUES
(1, 'xunda', '123'),
(2, 'bastiao', 'teste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`amiCodigo`);

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`empCodigo`);

--
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genCodigo`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`livCodigo`),
  ADD KEY `titulo` (`livTitulo`),
  ADD KEY `autor` (`livAutor`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuCodigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `amigos`
--
ALTER TABLE `amigos`
  MODIFY `amiCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `empCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `genCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `livCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
