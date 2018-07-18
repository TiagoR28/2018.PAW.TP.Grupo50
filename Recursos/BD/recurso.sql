-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Jul-2018 às 20:54
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recurso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `accoes`
--

CREATE TABLE `accoes` (
  `IdDossier` int(11) NOT NULL,
  `IdProc` int(11) NOT NULL,
  `Descricao` varchar(500) NOT NULL,
  `Data` date NOT NULL,
  `Solucao` enum('Reunioes','Pedidos','Encaminhamentos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `accoes`
--

INSERT INTO `accoes` (`IdDossier`, `IdProc`, `Descricao`, `Data`, `Solucao`) VALUES
(1, 1, 'Pedido de tranferencia', '2018-07-18', 'Pedidos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dossier`
--

CREATE TABLE `dossier` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Nascimento` date NOT NULL,
  `ContatoEnc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dossier`
--

INSERT INTO `dossier` (`Id`, `Nome`, `Nascimento`, `ContatoEnc`) VALUES
(1, 'Ze Pedro', '2017-10-10', 912342537),
(2, 'Marco Madanços', '1992-04-03', 583639385),
(3, 'Joana Machado', '2000-03-02', 942583538);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `IdPro` int(11) NOT NULL,
  `IdUser` varchar(20) NOT NULL,
  `Problema` enum('absentismo','indisciplina') NOT NULL,
  `Estado` enum('aberto','acompanhamento','encerrado') NOT NULL,
  `Criacao` date NOT NULL,
  `Limite` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`IdPro`, `IdUser`, `Problema`, `Estado`, `Criacao`, `Limite`) VALUES
(1, 'hugo1992', 'absentismo', 'encerrado', '2018-07-03', '2018-07-02'),
(2, 'hugo1992', 'absentismo', 'acompanhamento', '2018-07-12', '2020-02-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Tipo` enum('assistente','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`Username`, `Password`, `Nome`, `Tipo`) VALUES
('filipa1', 'e10adc3949ba59abbe56e057f20f883e', 'Filipa Mendes', 'assistente'),
('hugo1992', '827ccb0eea8a706c4c34a16891f84e7b', 'Hugo Napoleão', 'administrador'),
('tiago', 'e10adc3949ba59abbe56e057f20f883e', 'Tiago Rafael', 'assistente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accoes`
--
ALTER TABLE `accoes`
  ADD PRIMARY KEY (`IdDossier`),
  ADD KEY `Processo` (`IdProc`);

--
-- Indexes for table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`IdPro`),
  ADD KEY `Utilizador` (`IdUser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dossier`
--
ALTER TABLE `dossier`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `processo`
--
ALTER TABLE `processo`
  MODIFY `IdPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `accoes`
--
ALTER TABLE `accoes`
  ADD CONSTRAINT `Dossier` FOREIGN KEY (`IdDossier`) REFERENCES `dossier` (`Id`),
  ADD CONSTRAINT `Processo` FOREIGN KEY (`IdProc`) REFERENCES `processo` (`IdPro`);

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `Utilizador` FOREIGN KEY (`IdUser`) REFERENCES `users` (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
