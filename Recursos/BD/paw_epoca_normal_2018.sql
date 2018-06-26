-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jun-2018 às 19:39
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
-- Database: `paw_epoca_normal_2018`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `Id` int(11) NOT NULL,
  `idNome` int(11) NOT NULL,
  `idFunc` int(11) NOT NULL,
  `estado` enum('Vermelho','Verde','Amarelo','Espera','internado','alta','transferido') DEFAULT NULL,
  `entrada` date NOT NULL,
  `saida` date DEFAULT NULL,
  `limiteespera` date DEFAULT NULL,
  `idHospital` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`Id`, `idNome`, `idFunc`, `estado`, `entrada`, `saida`, `limiteespera`, `idHospital`) VALUES
(1, 1234567890, 1, 'Vermelho', '2018-06-19', '2018-06-20', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `Id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `observacoes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`Id`, `nome`, `observacoes`) VALUES
(1, 'Cardiovascular', 'Departamento responsável por realizar todos exames');

-- --------------------------------------------------------

--
-- Estrutura da tabela `exames`
--

CREATE TABLE `exames` (
  `idMedico` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  `tipo` enum('cardio','gerais','respiratorios') NOT NULL,
  `observacoes` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exames`
--

INSERT INTO `exames` (`idMedico`, `idConsulta`, `tipo`, `observacoes`) VALUES
(3, 1, 'cardio', 'OLA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipoFunc` enum('Recepcao','Medico','Admin') NOT NULL,
  `password` varchar(64) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `morada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `tipoFunc`, `password`, `genero`, `morada`) VALUES
(3, 'Teresa Freitas1', 'Medico', '81dc9bdb52d04dc20036dbd8313ed055', 'F', 'Rua xau e adeus '),
(4, 'Luis Silva', 'Medico', '81dc9bdb52d04dc20036dbd8313ed055', 'M', 'ASDenjd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idDepartamento` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `entradaDep` datetime NOT NULL,
  `saidaDep` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`idDepartamento`, `idConsulta`, `idFuncionario`, `entradaDep`, `saidaDep`) VALUES
(1, 1, 0, '2018-06-05 00:00:00', '2018-06-29 00:00:00'),
(1, 1, 3, '2018-06-13 00:00:00', '2018-06-29 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `observacoes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hospital`
--

INSERT INTO `hospital` (`id`, `nome`, `observacoes`) VALUES
(1, 'Hospital São Mamede', 'Hospital de São Mamede, capaz de atender todo o tipo de paciente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utente`
--

CREATE TABLE `utente` (
  `id` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idade` date NOT NULL,
  `genero` char(1) NOT NULL,
  `morada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utente`
--

INSERT INTO `utente` (`id`, `nome`, `idade`, `genero`, `morada`) VALUES
('1234567890', 'Hugo Napoleão', '2018-06-14', 'M', 'Guimarães'),
('17352846927', 'Tiago', '1995-06-03', 'M', 'Paços Ferreira'),
('21345678909', 'Zé Pedro', '1992-02-01', 'M', 'Joane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD KEY `idConsulta` (`idConsulta`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`idConsulta`) REFERENCES `consulta` (`id`),
  ADD CONSTRAINT `historico_ibfk_2` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
