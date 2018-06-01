-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Maio-2018 às 15:57
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
-- Database: `medcare`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `nomeId` int(11) NOT NULL,
  `medicoId` int(11) NOT NULL,
  `estado` enum('verde','amarelo','vermelho','espera','internado','alta','transferido') NOT NULL,
  `entrada` datetime NOT NULL,
  `saida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `Id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `observacoes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `id` int(11) NOT NULL,
  `tipo` enum('Radiografia','Ecografia','','') NOT NULL,
  `observacoes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipoFunc` enum('Recepcao','Medico','Admin','') NOT NULL,
  `genero` char(1) NOT NULL,
  `morada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idDepartamento` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  `entrada` datetime NOT NULL,
  `saida` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicos`
--

CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idade` date NOT NULL,
  `genero` char(1) NOT NULL,
  `morada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomeId` (`nomeId`),
  ADD KEY `medicoId` (`medicoId`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipoFunc` (`tipoFunc`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD KEY `idConsulta` (`idConsulta`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indexes for table `medicos`
--
ALTER TABLE `medicos`
  ADD KEY `idMedico` (`idMedico`),
  ADD KEY `idConsulta` (`idConsulta`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`nomeId`) REFERENCES `utente` (`id`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`medicoId`) REFERENCES `funcionario` (`id`);

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`idConsulta`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`Id`);

--
-- Limitadores para a tabela `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `funcionario` (`id`),
  ADD CONSTRAINT `medicos_ibfk_2` FOREIGN KEY (`idConsulta`) REFERENCES `consulta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
